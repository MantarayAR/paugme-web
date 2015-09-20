<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $dates = ['published_at'];

    public function setTitleAttributes($value) {
        $this->attributes['title'] = $value;

        if ( ! $this->exists ) {
            $this->attributes['slug'] = SlugService::getUniqueSlug( $value );
        }
    }

    public function author() {
        return $this->belongsTo(User::class);
    }

    public function timeToRead() {
        $word = str_word_count(strip_tags($this->content));
        $m = ceil($word / 200);

        $estimation = $m . ' min';

        return $estimation;
    }
}
