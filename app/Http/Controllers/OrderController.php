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
    	
    	$person = new Person();
    	$validator = $this->validate($request, [
    			'customer_ci'=>['required','max:255'],
    			'customer_name'=>['required','max:255'],
    			'customer_lastname'=>['required','max:255'],
    			'customer_phone'=>['required'],
    			'customer_address'=>['required'],
    			'customer_email'=>['required'],
    			'customer_email'=>['required'],
    			'product'=>['required'],
    	]);
    	
    	$person->fill($request->all());
    	$person->save();
    	
    	
    	$order = new Order();
    	
    	$order->commerce_id = '8226';
    	$order->customer_id = $person->id;
    	$order->product_description = $product[0]->description;
    	$order->product_amount = $product[0]->amount;
    	$order->product_id = $product[0]->id;
    	$order->response_url = 'https://pagosqioto.com/result';
    	$order->state = '00';
    	
    	$order->save();
    	
    	return Redirect::to('order');//
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
}
