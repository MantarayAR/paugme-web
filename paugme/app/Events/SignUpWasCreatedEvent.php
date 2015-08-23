<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class SignUpWasCreatedEvent extends Event
{
    use SerializesModels;

    public $sign_up;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct( $sign_up )
    {
        $this->sign_up = $sign_up;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
