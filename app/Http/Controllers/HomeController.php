<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Product;
use App\Person;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\ImageRepository;
use App\Jobs\Envio_Mensaje;
use Illuminate\Support\Facades\Auth;
use App\Jobs\Mail_Teacher;

class HomeController extends Controller
{
	private $commerce_id;
	private $response_url;
	protected $image;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
	public function __construct(ImageRepository $imageRepository)
    {
        $this->middleware('auth');
        
        $this->image = $imageRepository;
        
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
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$list_order = Order::join('persons', 'orders.customer_id','=','persons.id')
    	->join('products', 'orders.product_id','=','products.id')
    	->where('orders.state','<>','Autorizado')
    	->where('orders.pay_type',2)
    	->select('orders.id','orders.code','orders.state','orders.document_path','persons.customer_ci', 'persons.customer_name','persons.customer_lastname','persons.customer_email','products.name as pname', 'orders.updated_at')
    	->get();
    	
    	return view('home',['lista_ordenes' => $list_order]);
    }
    public function registro()
    {
    	$order = new Order();
    	$order->commerce_id = $this->commerce_id;
    	$order->customer_id = 999999;
    	$order->product_description = '999999';
    	$order->product_amount = '999999';
    	$order->product_id = '999999';
    	//$order->response_url = 'https://www.pagosqioto.com/register/';
    	$order->response_url = $this->response_url;
    	$order->state = 'por registrar';
    	
    	$order->save();
    	$order_id = $order->id;
    	
    	$product = DB::table('products')
    	->where('state',1)
    	->pluck('name','id');
    	
    	$products = $product;
    	
    	return view('register',['products' => $products, 'order_id' => $order_id]);
    }
    
    public function store($person, $product, $pay_type, Request $request)
    {
    	$passwNE = $this->generateRandomString();
    	
    	$result = DB::table('orders')
    	->where('id',$request->order_id)
    	->update(['code' => 'QSM'.$request->order_id, 'customer_id' => $person, 
    			'product_description' => $product[0]->description, 
    			'product_amount' => $product[0]->amount, 'product_id' => $product[0]->id,
    			'state' => 'Pendiente', 'password_ne' => $passwNE,'pay_type'=> $pay_type, 'user' => Auth::user()->email
    	]);
    	
    	$orders_persons = Order::join('persons', 'orders.customer_id','=','persons.id')
    	->join('products', 'orders.product_id','=','products.id')
    	->where('orders.id',$request->order_id)
    	->select('orders.code', 'orders.product_description', 'orders.password_ne', 'persons.customer_ci', 'persons.customer_name', 'persons.customer_lastname', 'persons.customer_email', 'products.code as pcode', 'products.name as pname')
    	->get();
    	
    	return $result;
    }
    
    public function save (Request $request){
    	$form_data = Input::all();
    	if( $form_data['file'] ){
    		$result = $this->image->upload($form_data);
    	}
    	return response()->json($result);
    }

    public function update_manual(Request $request){

    	$product = $this->search_product( $request->product );
    	$person = $this->search_person( $request->customer_ci, $request);
    	$order = $this->store($person, $product, 2, $request);
    	// 	    	return redirect()->route('home');
    	if($order){
	    	$cadena = '<p style="color: red; font-weight: 100;font-size: 20px;">Se ingreso correctamente el pedido.</p>';
	    	$results[] = [ 'value' => $cadena, 'flag' => 'OK'];
    	} else {
    		$cadena = '<p style="color: red; font-weight: 100;font-size: 20px;">No se ingreso correctamente el pedido.</p>';
    		$results[] = [ 'value' => $cadena, 'flag' => 'FAIL'];    		
    	}
    	return response()->json($results);
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
    		
    		$password = md5($data->password_ne);
    		
    		//$user =  DB::connection('mecapacitoecuador')->insert('insert into TB_USUARIOS(usu_usuario,usu_password,usu_nombre,usu_apellido,usu_mail,usu_perfil,cur_clave) value (?,?,?,?,?,?,?)',[$usuario,$password,$data->customer_name,$data->customer_lastname,$data->customer_email,'Estudiante',$data->pcode]);
    	}
    	return $user = 1;
    }

    public function clients()
    {
    	$list_clients= DB::table('teachers')
    	->where('state',1)
    	->paginate(20);
    	
    	return view('client',['lista_clientes' => $list_clients]);
    }

    public function update_teacher(Request $request)
    {
    	//dd($request);
    	$cliente = $list_clients= DB::table('teachers')
    	->where('id', $request->id)
    	->update(['contacted' => $request->contacted, 'facebook' => $request->facebook, 'interested' => $request->interested, 'observation' => $request->observation, 'user' =>  Auth::user()->email]);
    	
    	if ($cliente){
    		$cadena = '<p style="color: red; font-weight: 100;font-size: 20px;">Se actualizo correctamente el contacto.</p>';
    		$results[] = [ 'value' => $cadena, 'flag' => 'OK'];
    	}
    	else {
    		$cadena = '<p style="color: red; font-weight: 100;font-size: 20px;">No se actualizo correctamente el contacto.</p>';
    		$results[] = [ 'value' => $cadena, 'flag' => 'FAIL'];
    	}
    	
//     	return response()->json($results);
    	return redirect()->route('contactar');
    }

    public function showTeacher($id)
    {
    	$list_clients= DB::table('teachers')
    	->where('id',$id)
    	->get();

    	$cadena = '';
    	foreach ($list_clients as $client){
	    	$cadena .= '<div class="form-group">';
	    	$cadena .= '	    	<label class="control-label col-sm-2" for="contacted">Fue Contactado:</label>';
	    	$cadena .= '<div class="col-sm-10">';
	    	$cadena .= '	    		<input name="contacted" value="1" type="checkbox"';
	    	$cadena .= ($client->contacted)?(' checked="checked"'):('');
	    	$cadena .= '><input id="id" name="id" type="hidden" value="';
	    	$cadena .= $id;
	    	$cadena .= '">';
	    	$cadena .= '</div>';
	    	$cadena .= '    	</div>';
	    	$cadena .= '<div class="form-group">';
	    	$cadena .= '	    	<label class="control-label col-sm-2" for="facebook">Tiene facebook:</label>';
	    	$cadena .= '<div class="col-sm-10">';
	    	$cadena .= '	    		<input name="facebook" value="1" type="checkbox"';
	    	$cadena .= ($client->facebook)?(' checked="checked"'):('');
	    	$cadena .= '>';
	    	$cadena .= '</div>';
	    	$cadena .= '    	</div>';
	    	$cadena .= '<div class="form-group">';
	    	$cadena .= '	    	<label class="control-label col-sm-2" for="interested">Interesado:</label>';
	    	$cadena .= '<div class="col-sm-10">';
	    	$cadena .= '	    		<input name="interested" value="1" type="checkbox"';
	    	$cadena .= ($client->interested)?(' checked="checked"'):('');
	    	$cadena .= '>';
	    	$cadena .= '</div>';
	    	$cadena .= '    	</div>';
	    	$cadena .= '<div class="form-group">';
	    	$cadena .= '	    	<label class="control-label col-sm-2" for="observation">Observacion:</label>';
	    	$cadena .= '<div class="col-sm-10">';
	    	$cadena .= '		    	<textarea class="form-control" id="observation" name="observation" cols="40" rows="6">'.$client->observation.'</textarea>';
	    	$cadena .= '</div>';
	    	$cadena .= '    	</div>';
	    	$cadena .= '<div class="form-group">';
	    	$cadena .= '	    	<div class="col-sm-offset-2 col-sm-10">';
	    	$cadena .= '<input id="submitTeacher" name="submitTeacher" value="Guardar" class="btn btn-danger"  type="submit"  />';
	    	$cadena .= '	    	</div>';
	    	$cadena .= '</div>';
    	}
    	
    	$results[] = [ 'value' => $cadena, 'flag' => 'OK'];

    	return response()->json($results);
    }

    public function mailTeacher($id)
    {
    	$this->dispatch(new Mail_Teacher($id));
     	
    	DB::table('teachers')
    	->where('id', $id)
    	->update(['contacted' => true, 'user' =>  Auth::user()->email]);
    	    	
    	return redirect()->route('contactar');
    }
    
}
