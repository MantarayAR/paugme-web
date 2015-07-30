<?php

namespace App\Http\Controllers;

use App\Commands\CreateContactCommand;
use Illuminate\Http\Request;

use App\Http\Requests\ContactRequest;
use App\Http\Controllers\Controller;
use App\Contact;

class ContactController extends Controller
{
    /**
     * @param ContactRequest $request ContactRequest
     */
    public function store( ContactRequest $request ) {
        $contact = new Contact([
            'email' => $request->email,
            'message' => $request->message,
            'source' => 'General'
        ]);

        $command = new CreateContactCommand( $contact );
        $this->dispatch( $command );

        return redirect()->to('/thank-you');
    }
}
