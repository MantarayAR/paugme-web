@extends('master')

@section('content')
    <div class="sign-up">
        @include('home._mailchimp')

        <div class="sign-up__share">
            @include('home._share')
        </div>

        <div class="sign-up__link-back">
            <a href="/">
                &laquo; Back Home
            </a>
        </div>
    </div>
@stop
