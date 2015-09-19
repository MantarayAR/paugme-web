@extends('master')

@section('title')
    {{ $post->title }} - {{ config('blog.title') }}
@stop

@section('content')
    <div class="blog__content">
        <div class="blog__posts">
            <div class="blog__post">
                <h2>{{ $post->title }}</h2>
                <span class="blog__post__date">{{ $post->published_at->format('M jS Y g:ia') }}</span>
                <div class="blog__post__content">
                    {!! PostRenderer::render( $post ) !!}
                </div>
            </div>
        </div>
    </div>
@stop