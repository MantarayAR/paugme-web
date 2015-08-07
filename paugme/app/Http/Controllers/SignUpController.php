<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\SignUpRequest;
use App\SignUp;
use App\Commands\CreateSignUpCommand;

class SignUpController extends Controller
{
    public function store( SignUpRequest $request ) {
        $sign_up = new SignUp([
            'email' => $request->email,
            'source' => 'General'
        ]);

        $command = new CreateSignUpCommand( $sign_up );
        $this->dispatch( $command );

        return redirect()->to('/sign-up-thank-you');
    }
}
