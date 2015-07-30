<?php

namespace App\Commands;

use App\Commands\Command;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Contact;
use App\Events\ContactWasCreatedEvent;

class CreateContactCommand extends Command implements SelfHandling
{
    public $contact;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct( Contact $contact )
    {
        $this->contact = $contact;
    }

    /**
     * Execute the command.
     *
     * @return void
     */
    public function handle()
    {
        $this->contact->save();

        event(new ContactWasCreatedEvent( $this->contact ));
    }
}
