<?php

namespace App\Listeners;

use App\Events\MessageWasReceived;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

class SendAutoresponder
{
    

    /**
     * Handle the event.
     *
     * @param  MessageWasReceived  $event
     * @return void
     */
    public function handle(MessageWasReceived $event)
    {
       // var_dump('Enviar putorespondedor'); probar 
        
        $messages = $event->message;
        
        Mail::send('emails.contact',['msg'=> $messages],function($m) use ($messages){
                $m->to($messages->email,$messages->nombre)->subject('Tu mensaje fue recibido');
            });
    }
}
