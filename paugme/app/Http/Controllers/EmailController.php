<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class EmailController extends Controller
{
    public function view( $emailName ) {
        // TODO filter $emailName
        return view('emails.build.' . $emailName . '-compiled');
    }
}
