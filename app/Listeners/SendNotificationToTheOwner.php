<?php

namespace App\Listeners;

use Mail;
use App\Events\MessageWasReceived;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendNotificationToTheOwner
{
    

    /**
     * Handle the event.
     *
     * @param  MessageWasReceived  $event
     * @return void
     */
    public function handle(MessageWasReceived $event)
    {
        //var_dump('Notificar al dueño'); probar
        $messages = $event->message;
        
        Mail::send('emails.contact',['msg'=> $messages],function($m) use ($messages){
                $m->from($messages->email,$messages->nombre)
                ->to('dandresleon64@gmail.com','Andres')
                ->subject('Tu mensaje fue recibido');
            });
    }
}
