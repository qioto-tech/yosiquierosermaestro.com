<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	//	
	protected $table = 'teachers';
	protected $fillable = ['code','name','description','amount','state'];
	
}
