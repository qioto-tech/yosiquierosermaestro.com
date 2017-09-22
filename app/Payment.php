<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
	protected $table = 'payments';
	protected $fillable = ['commerce_id','customer_id','order_description','order_amount','order_id','response_url','state'];
	
}
