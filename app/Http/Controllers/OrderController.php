<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Redirect;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$product = DB::table('products')
    	->where('state',1)
    	->pluck('name','id');
    	
    	$products = $product;
    	
    	return view('order',['products'=>$products]);//
    	//
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$product = DB::table('products')
    	->where('id',$request->product)
    	->get();
    	
    	
    	$person = DB::table('persons')
    		->where('customer_ci',$request->customer_ci)
    		->get();
    	
    	$customer_id = $person[0]->id;
    	if ( count($person) == 0 )
    	{
    		$person = new Person();
	    	$validator = $this->validate($request, [
	    			'customer_ci'=>['required','max:255'],
	    			'customer_name'=>['required','max:255'],
	    			'customer_lastname'=>['required','max:255'],
	    			'customer_phone'=>['required'],
	    			'customer_address'=>['required'],
	    			'customer_email'=>['required'],
	    			'product'=>['required'],
	    	]);
	    	
	    	$person->fill($request->all());
	    	$person->save();
	    	$customer_id = $person->id;
    	}
    	
    	
    	
    	$order = new Order();
    	
    	$order->commerce_id = '8226';
    	$order->customer_id = $customer_id;
    	$order->product_description = $product[0]->description;
    	$order->product_amount = $product[0]->amount;
    	$order->product_id = $product[0]->id;
    	$order->response_url = 'https://www.pagosqioto.com/register/';
    	$order->state = '00';
    	
    	$order->save();
    	
    	DB::table('orders')
    	->where('id',$order->id)
    	->update(['code' => 'QSM'.$order->id]);
    	
    	$url = $this->pagosmedios($order->id);
    	$array = json_decode($url);
    	
    	return Redirect::to($array->data->payment_url);//
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
    
    private function pagosmedios($id)
    {
    	$orders = DB::table('orders')
    	->join('persons', 'orders.customer_id', '=' ,'persons.id')
    	->where('orders.id',$id)
    	->select('orders.code','orders.commerce_id','persons.customer_ci as pci','persons.customer_name','persons.customer_lastname','persons.customer_phone','persons.customer_address','persons.customer_email','orders.product_description','orders.product_amount','orders.product_id','orders.response_url')
    	->get();
    	
    	$url = 'https://app.pagomedios.com/api/setorder/'; //URL del servicio web REST
    	//$header = array('Content-Type: application/json',);
    	
    	foreach ($orders as $value){
    		$dataOrden = array(	'commerce_id' => $value->commerce_id, //ID unico por comercio
    				'customer_id' => $value->pci, //Identificación del tarjeta habiente (RUC, Cédula, Pasaporte)
    				'customer_name' => $value->customer_name, //Nombres del tarjeta habiente
    				'customer_lastname' => $value->customer_lastname, //Apellidos del tarjeta habiente
    				'customer_phones' => $value->customer_phone,  //Teléfonos del tarjeta habiente
    				'customer_address' => $value->customer_address,  //Dirección del tarjeta habiente
    				'customer_email' => $value->customer_email,  //Correo electrónico del tarjeta habiente
    				'customer_language' => 'es',  //Idioma del tarjeta habiente
    				'order_description' => $value->product_description,  //Descripción de la órden
    				'order_amount' => $value->product_amount, //Monto total de la órden
    				'order_id' => $value->code,
    				'response_url' => $value->response_url,
    		);
    	}
    	
    	$params = http_build_query( $dataOrden ); //Tranformamos un array en formato GET
    	//Consumo del servicio Rest
    	
    	//dd($params);
    	
    	$curl = curl_init();
    	curl_setopt($curl, CURLOPT_URL, $url.'?'.$params);
    	//dd($params);
//     	curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
    	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    	
    	$response = curl_exec($curl);
    	curl_close($curl);
    	
    	
    	
    	return $response;
    }
}
