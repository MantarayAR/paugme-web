<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $dates = ['published_at'];

    public function setTitleAttributes($value) {
        $this->attributes['title'] = $value;

        // TODO what guarantees uniqueness?
        if ( ! $this->exists ) {
            $this->attributes['slug'] = str_slug( $value );
        }
    }
}
