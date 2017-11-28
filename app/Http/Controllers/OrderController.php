<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\Person;
use App\Constant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Jobs\Envio_Mensaje;
use App\Jobs\Payment_Deposit;
use Redirect;
use Illuminate\Support\Facades\Auth;

/**
 * @author renvi
 *
 */
class OrderController extends Controller
{
	private $commerce_id;
	private $response_url;
	private $payment_service_other;
	private $payment_service;
	private $pending_url;
	private $home_url;
	
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
		$this->payment_service_other = $constants[0]->value;
		
		$constants= DB::table('constants')
		->where('code','pending_url')
		->select('value')
		->get();
		$this->pending_url = $constants[0]->value;

		$constants= DB::table('constants')
		->where('code','url_service_pay')
		->select('value')
		->get();
		$this->payment_service = $constants[0]->value;

		$constants= DB::table('constants')
		->where('code','home_url')
		->select('value')
		->get();
		$this->home_url = $constants[0]->value;
		
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
    		$data = ['order' => $order,
    			'from' => 'ysqsm',
			];
    		$parameters = implode(',',$data);
    		return Redirect::to( $this->payment_service. $parameters );//
    	} else {
    		$order = $this->payment_transfer( $request );
    		$this->dispatch(new Payment_Deposit( $order ));
    		return view('payment_transfer',[ 'datos'=> $order ]);//
    	}
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
     /**
     * Despliega los servicios por operador
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function RenderPartial($id_partial) {
        //
        
        $html = (String) view('uploadImagePopUp');
       
        return response()->json(['newHtml' => $html]);
    }
    
    /*  */
    public function approved( $order)
    {
    	
    	$datos = Order::join('persons', 'orders.customer_id','=','persons.id')
    	->join('products', 'orders.product_id','=','products.id')
    	->where('orders.code',$order)
    	->select('products.name as pname','orders.product_description','orders.code', 'orders.password_ne','persons.customer_ci', 'persons.customer_name','persons.customer_lastname','persons.customer_email','products.code as pcode')
    	->get();
    	
    	$usuario = 'Aspirante_'.$datos[0]->code;
    	$password = $datos[0]->password_ne;
    	
    	
        $this->dispatch(new Envio_Mensaje($datos[0]));
    	
        $list_product = Product::where('products.promotion',1)
        ->select('products.name as pname','products.code as pcode')
        ->get();
        
        
        return view('approved',['datos'=>$datos,'usuario'=>$usuario,'password'=>$password,'list_product'=>$list_product]);//
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
    	
    	$product = $this->search_product( $request->product );
    	$person = $this->search_person( $request->customer_ci, $request);
    	$order = $this->new_order($person, $product, 1);
     	
		return $order;
    }
    
    private function payment_transfer( $request ){
    	
    	$product = $this->search_product( $request->product );
    	$person = $this->search_person( $request->customer_ci, $request);
    	$order = $this->new_order($person, $product, 2);
    	
    	return $order;
    }
    
    private function search_product( $product_id ){
    	$product = DB::table('products')
    	->where('id',$product_id)
    	->get();
    	
    	return $product;
    }

    private function search_person( $person_ci, $request){
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
    	$state = ($pay_type == 1)?'Pendiente':'DEPOSITO';

    	$order = new Order();
    	
    	$order->commerce_id = $this->commerce_id;
    	$order->customer_id = $person;
    	$order->product_description = $product[0]->description;
    	$order->product_amount = $product[0]->amount;
    	$order->product_id = $product[0]->id;
    	//$order->response_url = 'https://www.pagosqioto.com/register/';
    	$order->response_url = $this->response_url;
    	$order->state = $state;
    	
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
        //dd($order);
    	
        $orders_persons = Order::join('persons', 'orders.customer_id','=','persons.id')
    	->join('products', 'orders.product_id','=','products.id')
    	->where('orders.id',$order)
    	->select('orders.code','orders.product_description','orders.password_ne', 'persons.customer_ci', 'persons.customer_name','persons.customer_lastname','persons.customer_email','products.code as pcode','orders.state')
    	->first();
    	
        if($orders_persons!=null)
        return view('deposit',['datos'=> $orders_persons,'order'=>$order]);
        else
          return redirect('/');
            
    }

    public function update_capacitate_ecuador($order){
    	return view('deposit',[ 'datos'=> $order]);
    }
    
    public function authorize_payment( $order ){

    	$orders_persons = Order::join('persons', 'orders.customer_id','=','persons.id')
    	->join('products', 'orders.product_id','=','products.id')
    	->where('orders.id', $order)
    	->select('orders.code', 'orders.product_description', 'orders.password_ne', 'persons.customer_ci', 'persons.customer_name', 'persons.customer_lastname', 'persons.customer_email', 'products.code as pcode', 'products.name as pname')
    	->get();
    	
    	$user = $this->actualizarmce ($orders_persons);
    	$orders_persons = Order::join('persons', 'orders.customer_id','=','persons.id')
    	->join('products', 'orders.product_id','=','products.id')
    	->where('orders.id', $order)
    	->select('orders.code', 'orders.product_description', 'orders.password_ne', 'persons.customer_ci', 'persons.customer_name', 'persons.customer_lastname', 'persons.customer_email', 'products.code as pcode', 'products.name as pname')
    	->get();
    	
    	$this->dispatch(new Envio_Mensaje($orders_persons[0]));
    	
    	//    	return Redirect::to('http://www.yosiquierosermaestro.com/home');
    	return Redirect::to( $this->home_url );
    }
    
    private function generateRandomString($length = 5) {
    	$characters = '123456789ABCDEFGHJKLMNPQRSTUVWXYZ';
    	$charactersLength = strlen($characters);
    	$randomString = '';
    	for ($i = 0; $i < $length; $i++) {
    		$randomString .= $characters[rand(0, $charactersLength - 1)];
    	}
    	return $randomString;
    }
    
    private function actualizarmce ($datas)
    {
    	foreach ($datas as $data){
    		$usuario = 'Aspirante_'.$data->code;
    		
    		if( $data->password_ne )
    			$passwNE = $data->password_ne;
    		else 
    			$passwNE = $this->generateRandomString();
    		
    		$password = md5( $passwNE );
    		
    		DB::table('orders')
    		->where('code',$data->code)
    		->update(['password_ne' => $passwNE, 'state' => 'Autorizado','user' => Auth::user()->email]);
    		
    		$user =  DB::connection('mecapacitoecuador')->insert('insert into TB_USUARIOS(usu_usuario,usu_password,usu_nombre,usu_apellido,usu_mail,usu_perfil,cur_clave) value (?,?,?,?,?,?,?)',[$usuario,$password,$data->customer_name,$data->customer_lastname,$data->customer_email,'Estudiante',$data->pcode]);
    	}
    	return $user = 1;
    }
    
    private function encryptIt( $data ) {
    	$cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
    	$dataEncoded = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $data, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
    	return( $dataEncoded );
    }
    
}
