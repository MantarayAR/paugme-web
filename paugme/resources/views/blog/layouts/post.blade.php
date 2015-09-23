@extends('master')

@section('title')
    {{ $post->title }} - {{ config('blog.title') }}
@stop

@section('content')
    @if($post->page_image)
        <header class="intro-header"
                style="background-image: url('{{ HtmlHelper::page_image($post->page_image) }}')">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                        <div class="site-heading">
                            <h1>{{ $post->title }}</h1>
                            <hr class="small">
                            <h2 class="subheading">{{ $post->subtitle }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    @endif
    <div class="blog__content">
        <div class="blog__posts">
            <div class="blog__post">
                <h2>{{ $post->title }}</h2>
                <span class="blog__meta">
                    {{ $post->published_at->format('M jS Y g:ia') }}
                    @if ($post->tags->count())
                        in
                        {!! join(', ', $post->tagLinks()) !!}
                    @endif
                </span>

                <div class="blog__post__content">
                    {!! PostRenderer::render( $post ) !!}
                </div>
            </div>

            <ul class="pager">
                @if ($tag && $tag->reverse_direction)
                    @if ($post->olderPost($tag))
                        <li class="previous">
                            <a href="{!! $post->olderPost($tag)->url($tag) !!}">
                                <i class="fa fa-long-arrow-left fa-lg"></i>
                                Previous {{ $tag->tag }} Post
                            </a>
                        </li>
                    @endif
                    @if ($post->newerPost($tag))
                        <li class="next">
                            <a href="{!! $post->newerPost($tag)->url($tag) !!}">
                                Next {{ $tag->tag }} Post
                                <i class="fa fa-long-arrow-right"></i>
                            </a>
                        </li>
                    @endif
                @else
                    @if ($post->newerPost($tag))
                        <li class="previous">
                            <a href="{!! $post->newerPost($tag)->url($tag) !!}">
                                <i class="fa fa-long-arrow-left fa-lg"></i>
                                Next Newer {{ $tag ? $tag->tag : '' }} Post
                            </a>
                        </li>
                    @endif
                    @if ($post->olderPost($tag))
                        <li class="next">
                            <a href="{!! $post->olderPost($tag)->url($tag) !!}">
                                Next Older {{ $tag ? $tag->tag : '' }} Post
                                <i class="fa fa-long-arrow-right"></i>
                            </a>
                        </li>
                    @endif
                @endif
            </ul>
        </div>
    </div>
@stop