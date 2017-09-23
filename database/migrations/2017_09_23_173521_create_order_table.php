<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create('orders', function ( $table ) {
    		$table->increments('id');
    		$table->string('commerce_id',11);
    		$table->string('customer_id');
    		$table->string('product_description');
    		$table->string('product_amount');
    		$table->string('product_id');
    		$table->string('response_url');
    		$table->string('state',5);
    		$table->timestamps();
    	});
    		//
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
