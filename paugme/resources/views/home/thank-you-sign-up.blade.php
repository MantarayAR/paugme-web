@extends('master')

@section('content')

    <div class="blue-backdrop">
        <div class="panel">
            <h2>Thank You!</h2>
            <p>Thanks for signing up! We will email you with
            updates about Paugme Packs.</p>
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