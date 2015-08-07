<?php

namespace App\Handlers\Events;

use App\Events\SignUpWasCreatedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyAdministratorsOfNewSignUp
{
    /**
     * Create the event handler.
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
     * @param  SignUpWasCreatedEvent  $event
     * @return void
     */
    public function handle(SignUpWasCreatedEvent $event)
    {
        // TODO
    }
}
