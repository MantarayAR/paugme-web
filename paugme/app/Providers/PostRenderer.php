<?php

namespace App\Providers;

use App\Post;
use GrahamCampbell\Markdown\Facades\Markdown;

/**
 * Class PostRenderer
 *
 * Utility Provider that helps with post rendering
 *
 * @package App\Providers
 */
class PostRenderer
{
    /**
     * Render a posts content using its preferred rendering strategy
     *
     * There are optional options that you may pass into this function:
     * - truncate - if true, this will limit the number of characters
     *
     * @param $post Post The post whose content you want to render
     * @param $options Array An array of option, see above for specifics
     * @return String
     */
    public static function render( Post $post, $options = [] ) {
        $content = $post->content;

        if ( array_key_exists( 'truncate', $options ) && $options['truncate'] ) {
            $content = str_limit( $content, config( 'blog.short_summary_length' ) );
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
