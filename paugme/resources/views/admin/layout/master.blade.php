<!DOCTYPE html>
<html>
<head>
    <title>
        @if (trim($__env->yieldContent('title')))
            @yield('title') - Admin
        @else
            Admin
        @endif
    </title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,700,400|Roboto:100,400|Roboto+Slab' rel='stylesheet'
          type='text/css'>
    <link href="/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="/css/app.css" rel="stylesheet" type="text/css">
    <link href="/css/admin.css" rel="stylesheet" type="text/css">
    @yield('head')
    @include('partials._favicon')

    <!--[if lt IE 9]>
    <script src="/js/vendor/html5shiv.min.js"></script>
    <![endif]-->
</head>
<body>
@include('partials._header')

<div class="row row-same-height">
    <div class="column-sm one-quarter">
        @include('admin.partials.sidebar')
    </div>
    <div class="column-sm three-quarters">
        @yield('content')
    </div>
</div>
@include('partials._footer')
<script src="/js/vendor/jquery-1.11.3.min.js"></script>
<script src="/js/vendor/headroom-0.7.0.min.js"></script>
<script src="/js/all.js"></script>
@yield('scripts')
</body>