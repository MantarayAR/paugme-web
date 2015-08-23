<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class EmailController extends Controller
{
    public function view( $emailName ) {
        // TODO filter $emailName
        $data = [];

        switch ( $emailName ) {
            case 'thank-you':
                $data = [
                    'thankYouTitle' => 'Thank you title goes here',
                    'thankYouMessage' => 'Thank you message goes here'
                ];
        }

        return view('emails.build.' . $emailName . '-compiled', $data);
    }
}
