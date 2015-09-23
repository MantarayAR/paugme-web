<?php

namespace App\Http\Controllers;

use App\Commands\BlogIndexDataCommand;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use Carbon\Carbon;

class BlogController extends Controller
{
    public function index(Request $request) {

        $tag = $request->get('tag');
        $data = $this->dispatch(new BlogIndexDataCommand($tag));

        $layout = $tag ? Tag::layout($tag) : 'blog.layouts.index';
        return view($layout, $data);
    }

    public function showPost($slug, Request $request) {
        $post = Post::with(['tags', 'author'])->whereSlug($slug)->firstOrFail();
        $tag = $request->get('tag');
        if( $tag) {
            $tag = Tag::whereTag($tag)->firstOrFail();
        }

        return view($post->layout, compact('post', 'tag'));
    }
}
