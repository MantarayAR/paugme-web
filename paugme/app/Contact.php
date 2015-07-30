<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Contact extends Eloquent
{
    protected $fillable = array(
        'email',
        'message',
        'source'
    );
}
