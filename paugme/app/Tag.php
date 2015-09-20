<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public static function fields() {
        return [
            'tag' => '',
            'title' => '',
            'subtitle' => '',
            'meta_description' => '',
            'page_image' => '',
            'layout' => 'blog.layouts.index',
            'reverse_direction' => 0,
        ];
    }
}
