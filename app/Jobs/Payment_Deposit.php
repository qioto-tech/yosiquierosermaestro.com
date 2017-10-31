<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Mail\Mailer;
use App\Order;

class Payment_Deposit extends Job 

{
    protected $order;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct( $order )
    {
        //
    	$datos = Order::join('persons', 'orders.customer_id','=','persons.id')
    	->where('orders.id',$order)
    	->select('orders.id','persons.customer_email')
    	->get();

    	$this->order = $datos[0];
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    
    public function handle(Mailer $mailer)
    {
        $data = [
            'title'  => "Pago Pendiente de Registro",
            'nombrede'  => "Capacitate Ecuador",
            'orden'   => $this->order->id,
        	'email'   => $this->order->customer_email,
        ];
        
        $mailer->send('paymentEmail', $data, function($message) {
            $message->to($this->order->customer_email)
                    ->subject("Pago Pendiente Capacitate Ecuador");
        });
    }
    
}
