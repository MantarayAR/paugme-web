<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'tag', 'title', 'subtitle', 'page_image', 'meta_description',
        'reverse_direction',
    ];

    /**
     * The many-to-many relationship between tags and posts.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function posts() {
        return $this->belongsToMany(Post::class, 'post_tag_pivot');
    }

    public static function addNeededTags(array $tags) {
        if (count($tags) === 0) {
            return;
        }

        $found = static::whereIn('tag', $tags)->lists('tag')->all();

        foreach(array_diff($tags, $found) as $tag ) {
            static::create([
                'tag' => $tag,
                'title' => $tag,
                'subtitle' => 'Subtitle for ' . $tag,
                'page_image' => '',
                'meta_description' => '',
                'reverse_direction' => false
            ]);
        }
    }

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
