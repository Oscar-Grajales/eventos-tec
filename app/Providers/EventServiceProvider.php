<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

use App\Events\EventStatusChanged;
use App\Listeners\NotifyClient;

use App\Models\Pack;
use App\Observers\PackObserver;
// use App\Models\Event;
use App\Observers\EventObserver;
use App\Models\Expense;
use App\Observers\ExpenseObserver;
use App\Models\Payment;
use App\Observers\PaymentObserver;
use App\Models\User;
use App\Observers\UserObserver;
use App\Models\Photo;
use App\Observers\PhotoObserver;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        EventStatusChanged::class => [
            NotifyClient::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Pack::observe(PackObserver::class);
        \App\Models\Event::observe(EventObserver::class);
        Expense::observe(ExpenseObserver::class);
        Payment::observe(PaymentObserver::class);
        User::observe(UserObserver::class);
        Photo::observe(PhotoObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
