<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Mail\Mailer;
use App\Order;

class Envio_Mensaje extends Job 

{
    protected $order;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        //
          $this->order = $order;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    
    public function handle(Mailer $mailer)
    {
        $data = [
            'title'  => "Confirmación de compra Capacitate Ecuador",
            'nombrede'  => "Capacitate Ecuador",
            'usuario'   => "Aspirante_".$this->order->code,
            'password'   => $this->order->password_ne,
            
        ];
        
        $mailer->send('confirmEmail', $data, function($message) {
            $message->to($this->order->customer_email)
                    ->subject("Confirmacion Capacitate Ecuador");
        });
    }
    
}
