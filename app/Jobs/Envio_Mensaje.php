<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Mail\Mailer;

class Envio_Mensaje extends Job implements SelfHandling

{
    protected $invitacion;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Invitaciones_Amigos $invitacion)
    {
        //
          $this->invitacion = $invitacion;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    
    public function handle(Mailer $mailer)
    {
        $data = [
            'title'  => "Mensaje para iWaNaTrip.com",
            'nombrede'  => $this->invitacion->invitacion_de,
            'nombrepara'   => "info@iwannatrip.com",
            
        ];
        
        $mailer->send('emails.auth.inviteFriend', $data, function($message) {
            $message->to( $this->invitacion->correo, $this->invitacion->invitacion_para)
                    ->subject("Invitación iWaNaTrip.com");
        });
    }
    
}
