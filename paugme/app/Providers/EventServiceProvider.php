<?php

namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\Handlers\Events\NotifyAdministratorsOfNewContact;
use App\Handlers\Events\ThankContactSender;
use App\Handlers\Events\NotifyAdministratorsOfNewSignUp;
use App\Handlers\Events\ThankSignUpSender;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\ContactWasCreatedEvent' => [
            NotifyAdministratorsOfNewContact::class,
            ThankContactSender::class,
        ],
        'App\Events\SignUpWasCreatedEvent' => [
            NotifyAdministratorsOfNewSignUp::class,
            ThankSignUpSender::class,
        ],
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        //
    }
}
