<?php

namespace App\Providers;

use App\Post;
use GrahamCampbell\Markdown\Facades\Markdown;

class PostRenderer
{
    public static function render( Post $post ) {
        switch( $post->renderer ) {
            case 'html':
                return $post->content;
            case 'markdown':
            default:
                return Markdown::convertToHtml( $post->content );
        }
    }
}
