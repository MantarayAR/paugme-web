@extends('master')

@section('title')
    {{ $post->title }} - {{ config('blog.title') }}
@stop

@section('content')
    <h1>{{ $post->title }}</h1>
    <h5>{{ $post->published_at->format('M jS Y g:ia') }}</h5>
    <hr>
    {!! nl2br(e($post->content)) !!}
    <hr>
    <button class="btn btn-primary" onclick="history.go(-1)">
        &laquo; Back
    </button>

@stop