@extends('master')

@section('title')
    {{ config('blog.title') }}
@stop

@section('content')
    @if( $page_image )
        <header class="intro-header"
                style="background-image: url('{{ HtmlHelper::page_image($page_image) }}')">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                        <div class="site-heading">
                            <h1>{{ $title }}</h1>
                            <hr class="small">
                            <h2 class="subheading">{{ $subtitle }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    @endif
    <div class="blog__content">
        <h1>{{ config('blog.title') }}</h1>
        <div class="blog__content__page">
            Page {{ $posts->currentPage() }} of {{ $posts->count() }}
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

                        <p class="post-meta">
                            @if ($post->tags->count())
                                Tags
                                {!! join(', ', $post->tagLinks()) !!}
                            @endif
                        </p>
                    </div>

                    <div class="blog__post__read-more">
                        <a href="/blog/{{$post->slug}}">Read More</a>
                        <span class="blog__post__time">{{$post->timeToRead()}}</span>
                    </div>
                </div>
            @endforeach
        </div>
        <hr>
        {{-- The Pager --}}
        <ul class="pager">

            {{-- Reverse direction --}}
            @if ($reverse_direction)
                @if ($posts->currentPage() > 1)
                    <li class="previous">
                        <a href="{!! $posts->url($posts->currentPage() - 1) !!}">
                            <i class="fa fa-long-arrow-left fa-lg"></i>
                            Previous {{ $tag->tag }} Posts
                        </a>
                    </li>
                @endif
                @if ($posts->hasMorePages())
                    <li class="next">
                        <a href="{!! $posts->nextPageUrl() !!}">
                            Next {{ $tag->tag }} Posts
                            <i class="fa fa-long-arrow-right"></i>
                        </a>
                    </li>
                @endif
            @else
                @if ($posts->currentPage() > 1)
                    <li class="previous">
                        <a href="{!! $posts->url($posts->currentPage() - 1) !!}">
                            <i class="fa fa-long-arrow-left fa-lg"></i>
                            Newer {{ $tag ? $tag->tag : '' }} Posts
                        </a>
                    </li>
                @endif
                @if ($posts->hasMorePages())
                    <li class="next">
                        <a href="{!! $posts->nextPageUrl() !!}">
                            Older {{ $tag ? $tag->tag : '' }} Posts
                            <i class="fa fa-long-arrow-right"></i>
                        </a>
                    </li>
                @endif
            @endif
        </ul>
    </div>
@stop
