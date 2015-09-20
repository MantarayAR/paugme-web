<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use Carbon\Carbon;

class BlogController extends Controller
{
    public function index() {
        $posts = Post::with(['author'])
            ->where('published_at', '<=', Carbon::now())
            ->orderBy('published_at', 'desc')
            ->paginate(config('blog.posts_per_page'));

        return view('blog.index', compact('posts'));
    }

    public function showPost($slug) {
        $post = Post::whereSlug($slug)->firstOrFail();
        $user = Post::whereId($post->author_id)->firstOrFail();

        return view('blog.post')
            ->withPost($post)
            ->withAuthor($user);
    }
}
