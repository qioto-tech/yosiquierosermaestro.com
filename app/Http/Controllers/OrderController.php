<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\Person;
use App\Constant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Jobs\Envio_Mensaje;
use Redirect;

class OrderController extends Controller
{
	private $commerce_id;
	private $response_url;
	private $payment_service_other;
	private $payment_service;
	
	function __construct() {
		$constants= DB::table('constants')
		->where('code','commerce_id')
		->select('value')
		->get();
		$this->commerce_id = $constants[0]->value;
		
		$constants= DB::table('constants')
		->where('code','response_url')
		->select('value')
		->get();
		$this->response_url= $constants[0]->value;
		
		$constants= DB::table('constants')
		->where('code','pay_url')
		->select('value')
		->get();
		$this->payment_service_other= $constants[0]->value;
	}
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
     * pay_type 1 = taarjeta de credito 2 transferencia bancaria
     */
    public function store(Request $request)
    {
    	
    	if ( $request->pay_type == 1 ){
    		$order= $this->payment_credit_card( $request );
    		$url = $this->pagosmedios($order);
    		$array = json_decode($url);
    		return Redirect::to('https://pagosqioto.local/api/payment/'.$order->id);//
    	} else {
    		$order = $this->payment_transfer( $request );
    		
    		return view('payment_transfer',[ 'datos'=> $order ]);//
    		
    	}
    	

    	//    	$url = $this->pagosmedios($order->id);
//    	$array = json_decode($url);
    	
    	//return Redirect::to($array->data->payment_url);//
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
    				'customer_id' => $value->pci, //Identificaci�n del tarjeta habiente (RUC, C�dula, Pasaporte)
    				'customer_name' => $value->customer_name, //Nombres del tarjeta habiente
    				'customer_lastname' => $value->customer_lastname, //Apellidos del tarjeta habiente
    				'customer_phones' => $value->customer_phone,  //Tel�fonos del tarjeta habiente
    				'customer_address' => $value->customer_address,  //Direcci�n del tarjeta habiente
    				'customer_email' => $value->customer_email,  //Correo electr�nico del tarjeta habiente
    				'customer_language' => 'es',  //Idioma del tarjeta habiente
    				'order_description' => $value->product_description,  //Descripci�n de la �rden
    				'order_amount' => $value->product_amount, //Monto total de la �rden
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
    
    public function approved( $order)
    {
    	$datos = Order::join('persons', 'orders.customer_id','=','persons.id')
    	->where('orders.code',$order)
    	->select('orders.product_description','orders.code', 'orders.password_ne','persons.customer_ci', 'persons.customer_name','persons.customer_lastname','persons.customer_email')
    		->get();
    	$usuario = 'Aspirante_'.$datos[0]->code;
    	$password = $datos[0]->password_ne;
        
        $this->dispatch(new Envio_Mensaje($datos[0]));
    	
    	return view('approved',['datos'=>$datos,'usuario'=>$usuario,'password'=>$password]);//
    }
    
    public function disapproved($order)
    {
    	$datos = Order::join('persons', 'orders.customer_id','=','persons.id')
    	->where('orders.code',$order)
    	->select('orders.product_description', 'persons.customer_ci', 'persons.customer_name','persons.customer_lastname','persons.customer_email')
    	->get();
    	$usuario = 'No se realizo el pago';
    	$password = '';
    	
    	return view('disapproved',['datos'=>$datos,'usuario'=>$usuario,'password'=>$password]);//
    }
    
    private function payment_credit_card( $request ){
//     	$product = DB::table('products')
//     	->where('id',$request->product)
//     	->get();
    	
    	$product = $this->search_product( $request->product );
    	$person = $this->search_person( $request->customer_ci);
    	$order = $this->new_order($person, $product, 1);
    	
//     	$person = DB::table('persons')
//     	->where('customer_ci',$request->customer_ci)
//     	->get();
    	
    	
//     	if ( count($person) == 0 )
//     	{
//     		$person = new Person();
//     		$validator = $this->validate($request, [
//     				'customer_ci'=>['required','max:255'],
//     				'customer_name'=>['required','max:255'],
//     				'customer_lastname'=>['required','max:255'],
//     				'customer_phone'=>['required'],
//     				'customer_address'=>['required'],
//     				'customer_email'=>['required'],
//     				'product'=>['required'],
//     		]);
    		
//     		$person->fill($request->all());
//     		$person->save();
//     		$customer_id = $person->id;
//     	} else {
//     		$customer_id = $person[0]->id;
//     	}
    	
    	
    	
//     	$order = new Order();
    	
//     	$order->commerce_id = '8226';
//     	$order->customer_id = $customer_id;
//     	$order->product_description = $product[0]->description;
//     	$order->product_amount = $product[0]->amount;
//     	$order->product_id = $product[0]->id;
//     	//$order->response_url = 'https://www.pagosqioto.com/register/';
//     	$order->response_url = 'https://pagosqioto.local/register/';
//     	$order->state = 'Pendiente';
    	
//     	$order->save();
    	
//     	DB::table('orders')
//     	->where('id',$order->id)
//     	->update(['code' => 'QSM'.$order->id]);
		return $order;
    }
    
    private function payment_transfer( $request ){
    	
    	$product = $this->search_product( $request->product );
    	$person = $this->search_person( $request->customer_ci);
    	$order = $this->new_order($person, $product, 2);
    	
    	return $order;
    }
    
    private function search_product( $product_id ){
    	$product = DB::table('products')
    	->where('id',$product_id)
    	->get();
    	
    	return $product;
    }

    private function search_person( $person_ci ){
    	$person = DB::table('persons')
    	->where('customer_ci',$person_ci)
    	->get();
    	
    	
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
    	} else {
    		$customer_id = $person[0]->id;
    	}
    	
    	return $customer_id;
    }
    
    private function new_order($person, $product, $pay_type){
    	$order = new Order();
    	
    	$order->commerce_id = $this->commerce_id;
    	$order->customer_id = $person;
    	$order->product_description = $product[0]->description;
    	$order->product_amount = $product[0]->amount;
    	$order->product_id = $product[0]->id;
    	//$order->response_url = 'https://www.pagosqioto.com/register/';
    	$order->response_url = $this->response_url;
    	$order->state = 'DEPOSITO';
    	
    	$order->save();
    	
    	DB::table('orders')
    	->where('id',$order->id)
    	->update(['code' => 'QSM'.$order->id, 'pay_type'=> $pay_type]);
    	
    	return $order->id;
    }
    
    public function pending(){
    	$orders = DB::table('orders')
    	->where('pay_type',2)
    	->where('state','Pendiente')
    	->get();
    	
    	return view('pending',[ 'datos'=> $orders]);//
    }
    
    public function deposit($order){
    	return view('deposit',[ 'datos'=> $order]);
    }
    
}
