<?php

namespace App\Commands;

use App\Commands\Command;
use Illuminate\Contracts\Bus\SelfHandling;
use App\SignUp;
use App\Events\SignUpWasCreatedEvent;

class CreateSignUpCommand extends Command implements SelfHandling
{
    protected $sign_up;
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct( SignUp $sign_up )
    {
        $this->sign_up = $sign_up;
    }

    /**
     * Execute the command.
     *
     * @return void
     */
    public function handle()
    {
        $this->sign_up->save();

        event(new SignUpWasCreatedEvent( $this->sign_up ));
    }
}
