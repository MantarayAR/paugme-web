<?php

namespace App;

use App\Helpers\SlugHelper;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    protected $fillable = [
        'title', 'subtitle', 'content', 'page_image', 'meta_description', 'layout',
        'is_draft', 'published_at', 'author_id', 'rendering_type',
    ];
    protected $dates = ['published_at'];

    /**
     * Return url to post
     *
     * @param Tag|null $tag
     * @return string
     */
    public function url(Tag $tag = null)
    {
        $url = url('blog/' . $this->slug);
        if ($tag) {
            $url .= '?tag=' . urlencode($tag->tag);
        }

        return $url;
    }

    public function tagLinks($base = '/blog?tag=%TAG%')
    {
        $tags = $this->tags()->lists('tag');
        $return = [];
        foreach ($tags as $tag) {
            $url = str_replace('%TAG%', urlencode($tag), $base);
            $return[] = '<a href="' . $url . '">' . e($tag) . '</a>';
        }

        return $return;
    }

    /**
     * Return next post after this one or null
     *
     * @param Tag|null $tag
     * @return mixed
     */
    public function newerPost(Tag $tag = null)
    {
        $query = static::where('published_at', '>', $this->published_at)
            ->where('published_at', '<=', Carbon::now())
            ->where('is_draft', 0)
            ->orderBy('published_at', 'asc');
        if ($tag) {
            $query = $query->whereHas('tags', function ($q) use ($tag) {
                $q->where('tag', '=', $tag->tag);
            });
        }

        return $query->first();
    }

    public function olderPost(Tag $tag = null)
    {
        $query = static::where('published_at', '<', $this->published_at)
            ->where('is_draft', 0)
            ->orderBy('published_at', 'desc');
        if ($tag) {
            $query = $query->whereHas('tags', function ($q) use ($tag) {
                $q->where('tag', '=', $tag->tag);
            });
        }

        return $query->first();
    }

    /**
     * Set the slug when setting the title attribute
     *
     * @param $value
     */
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;

        if (!$this->exists) {
            $this->attributes['slug'] = SlugHelper::getUniqueSlug($this, str_slug($value));
        }
    }

    /**
     * The one-to-many relationship of Users to Posts
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The many-to-many relationship between Posts and Tags
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tag_pivot');
    }

    /**
     * Sync tag relation adding new tags as needed
     * @param array $tags
     */
    public function syncTags(array $tags)
    {
        Tag::addNeededTags($tags);

        if (count($tags)) {
            $this->tags()->sync(
                Tag::whereIn('tag', $tags)->lists('id')->all()
            );
            return;
        }

        $this->tags()->detach();
    }

    /**
     * Determine how long a post tags to read
     *
     * @return string
     */
    public function timeToRead()
    {
        $word = str_word_count(strip_tags($this->content));
        $m = ceil($word / 200);

        $estimation = $m . ' min';

        return $estimation;
    }

    /**
     * Return the date portion of published_at
     *
     * @return string
     */
    public function getPublishDateAttribute()
    {
        return $this->published_at->format('M-j-Y');
    }

    /**
     * Return the time portion of published_at
     *
     * @return string
     */
    public function getPublishTimeAttribute()
    {
        return $this->published_at->format('g:i A');
    }

    public static function fields()
    {
        return [
            'title' => '',
            'subtitle' => '',
            'page_name' => '',
            'content' => '',
            'meta_description' => '',
            'is_draft' => '0',
            'publish_date' => '',
            'publish_time' => '',
            'layout' => 'blog.layouts.post',
            'tags' => [],
        ];
    }
}
