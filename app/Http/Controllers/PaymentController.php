<?php

namespace App\Http\Controllers;

use App\Payment;
use App\Product;
use App\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Redirect;

class PaymentController extends Controller
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
    
    	return view('payment',['products'=>$products]);//
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
        //
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
    	
    	
    	$payment = new Payment();
    	
    	$payment->commerce_id = 'rl0001';
    	$payment->customer_id = $person->id;
    	$payment->product_description = $product[0]->description;
    	$payment->product_amount = $product[0]->amount;
    	$payment->product_id = $product[0]->id;
    	$payment->response_url = 'https://pagosqioto.com/result';
    	$payment->state = '00';
    	
       	$payment->save();
    	
    	return Redirect::to('payment');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
