<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Mail;
use App\Mail\NotifyRejection;
use App\Events\EventStatusChanged;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyClient
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
     * @param  \App\Events\EventStatusChanged  $event
     * @return void
     */
    public function handle(EventStatusChanged $event)
    {
        $eventChanged = $event->event;
        $email = $eventChanged->user->email;
        Mail::to($email)->send(new NotifyRejection($eventChanged));
    }
}
