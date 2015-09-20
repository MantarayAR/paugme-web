@extends('master')

@section('title')
    {{ config('blog.title') }}
@stop

@section('content')
    <div class="blog__content">
        <h1>{{ config('blog.title') }}</h1>
        <div class="blog__content__page">
            Page {{ $posts->currentPage() }} of {{ $posts->lastPage() }}
        </div>
        <hr>
        <div class="blog__posts">
            @foreach ($posts as $post)
                <div class="blog__post">
                    <div class="author__card">
                        <div><a href="/blog/author/{{ $post->author->slug }}">{{ $post->author->name }}</a></div>
                        <span class="blog__post__date">{{ $post->published_at->format('M jS Y g:ia') }}</span>
                    </div>
                    <h2><a href="/blog/{{ $post->slug }}">{{ $post->title }}</a></h2>

                    <div class="blog__post__content">
                        {!! PostRenderer::render( $post, [ 'truncate' => true ] ) !!}
                    </div>

                    <div class="blog__post__read-more">
                        <a href="/blog/{{$post->slug}}">Read More</a>
                        <span class="blog__post__time">{{$post->timeToRead()}}</span>
                    </div>
                </div>
            @endforeach
        </div>
        <hr>
        {!! $posts->render() !!}
    </div>
@stop
