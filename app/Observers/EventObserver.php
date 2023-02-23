<?php

namespace App\Observers;

use Illuminate\Support\Facades\Auth;

use App\Models\Log;

use App\Models\Event;

class EventObserver
{
    /**
     * Handle the Event "created" event.
     *
     * @param  \App\Models\Event  $event
     * @return void
     */
    public function created(Event $event)
    {
        $log = Log::create([
            'user_id' => Auth::id(),
            'action' => 'Event created',
            'record' => $event->toJson()
        ]);
    }

    /**
     * Handle the Event "updated" event.
     *
     * @param  \App\Models\Event  $event
     * @return void
     */
    public function updated(Event $event)
    {
        $log = Log::create([
            'user_id' => Auth::id(),
            'action' => 'Event updated',
            'record' => $event->toJson()
        ]);
    }

    /**
     * Handle the Event "deleted" event.
     *
     * @param  \App\Models\Event  $event
     * @return void
     */
    public function deleted(Event $event)
    {
        $log = Log::create([
            'user_id' => Auth::id(),
            'action' => 'Event deleted',
            'record' => $event->toJson()
        ]);
    }

    /**
     * Handle the Event "restored" event.
     *
     * @param  \App\Models\Event  $event
     * @return void
     */
    public function restored(Event $event)
    {
        //
    }

    /**
     * Handle the Event "force deleted" event.
     *
     * @param  \App\Models\Event  $event
     * @return void
     */
    public function forceDeleted(Event $event)
    {
        //
    }
}
