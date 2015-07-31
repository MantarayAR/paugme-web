<?php

namespace App\Handlers\Events;

use App\Events\ContactWasCreatedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

class ThankContactSender
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
        Mail::send('emails.thank-you', [
            'contact' => $event->contact
        ], function ( $message ) use ( $event ) {
            $message->to(
                $event->contact->email,
                ''
            );
            $message->subject('Thank you for your message!');
            $message->from('noreply@paugme.com', 'Paugme Packs Support');
        });
    }
}
