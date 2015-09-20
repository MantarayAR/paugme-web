<?php

namespace App\Providers;

use App\Post;
use GrahamCampbell\Markdown\Facades\Markdown;

class PostRenderer
{
    public static function render( Post $post, $options ) {
        $content = $post->content;

        if ( $options['truncate'] ) {
            $content = str_limit( $content, config('blog.short_summary_length' ) );
        }

        switch( $post->renderer ) {
            case 'html':
                return $content;
            case 'markdown':
            default:
                return Markdown::convertToHtml( $content );
        }
    }
}
