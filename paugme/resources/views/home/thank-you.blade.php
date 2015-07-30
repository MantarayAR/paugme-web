@extends('master')


@section('content')

    <div class="blue-backdrop">
        <div class="panel">
            <h2>Thank You!</h2>
            <p>We will respond to your message as
            quickly as possible.</p>
        </div>

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