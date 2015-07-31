<?php

namespace App\Handlers\Events;

use App\Events\ContactWasCreatedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyAdministratorsOfNewContact
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
     * @param  ContactWasCreatedEvent  $event
     * @return void
     */
    public function handle(ContactWasCreatedEvent $event)
    {
        // TODO
    }
}
