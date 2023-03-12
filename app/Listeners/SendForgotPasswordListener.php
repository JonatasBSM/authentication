<?php

namespace App\Listeners;

use App\Mail\Auth\RecoverPasswordMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendForgotPasswordListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        Mail::to($event->data['email'])->send(new RecoverPasswordMail($event->data['link']));
    }
}
