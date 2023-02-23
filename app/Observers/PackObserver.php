<?php

namespace App\Observers;

use Illuminate\Support\Facades\Auth;

use App\Models\Log;

use App\Models\Pack;

class PackObserver
{
    /**
     * Handle the Pack "created" event.
     *
     * @param  \App\Models\Pack  $pack
     * @return void
     */
    public function created(Pack $pack)
    {
        $log = Log::create([
            'user_id' => Auth::id(),
            'action' => 'Pack created',
            'record' => $pack->toJson()
        ]);
    }

    /**
     * Handle the Pack "updated" event.
     *
     * @param  \App\Models\Pack  $pack
     * @return void
     */
    public function updated(Pack $pack)
    {
        $log = Log::create([
            'user_id' => Auth::id(),
            'action' => 'Pack updated',
            'record' => $pack->toJson()
        ]);
    }

    /**
     * Handle the Pack "deleted" event.
     *
     * @param  \App\Models\Pack  $pack
     * @return void
     */
    public function deleted(Pack $pack)
    {
        //
    }

    /**
     * Handle the Pack "restored" event.
     *
     * @param  \App\Models\Pack  $pack
     * @return void
     */
    public function restored(Pack $pack)
    {
        //
    }

    /**
     * Handle the Pack "force deleted" event.
     *
     * @param  \App\Models\Pack  $pack
     * @return void
     */
    public function forceDeleted(Pack $pack)
    {
        //
    }
}
