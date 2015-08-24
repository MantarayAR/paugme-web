<?php

namespace App\Handlers\Events;

use App\Events\SignUpWasCreatedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

class ThankSignUpSender implements ShouldQueue
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
        Mail::queue('emails.build.thank-you-compiled', [
            'signUp' => $event->sign_up,
            'thankYouTitle' => 'Thank you for signing up to the Paugme Packs Newsletter!',
            'thankYouMessage' => "
                You will get the latest news directly from us! We hope you will enjoy
                Paugme Packs, which we will be opening up for pre-orders soon!
            "
        ], function ( $message ) use ( $event ) {
            $message->to(
                $event->sign_up->email,
                '' // Should be the name
            );

            $message->subject('Thank you for signing up!');
            $message->from('noreply@paugme.com', 'Paugme Packs Newsletter');
        } );
    }
}
