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
            'title'  => "ConfirmaciÃ³n de compra Capacitate Ecuador",
            'nombrede'  => "Capacitate Ecuador",
            'usuario'   => "Aspirante_".$this->order->code,
            'password'   => $this->order->password_ne,
        	'nombre'   => strtoupper($this->order->customer_name),
        	'apellido'   => strtoupper($this->order->customer_lastname),
        	'code'   => $this->order->pcode,
        	'curso'   => $this->order->pname,
        		
        ];
        
        $mailer->send('confirmEmail', $data, function($message) {
            $message->to($this->order->customer_email)
            ->subject(utf8_encode("Confirmación de inscripción a la prueba de " . $this->order->pname));
        });
    }
    
}
