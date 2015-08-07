<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SignUp extends Model
{
    protected $table = 'sign_ups';
    protected $fillable = array(
        'email',
        'source'
    );
}
