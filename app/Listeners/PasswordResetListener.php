<?php

namespace App\Listeners;

use App\Events\PasswordResetEvent;
use App\Mail\AppMails\NewPasswordMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class PasswordResetListener
{

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\PasswordResetEvent  $event
     * @return void
     */
    public function handle(PasswordResetEvent $event)
    {
        $notifiable = $event->notifiable;
        Mail::to($notifiable->email)->send(new NewPasswordMail($notifiable));
    }
}
