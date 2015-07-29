<!DOCTYPE html>
<html>
<head>
    <title>Paugme Packs</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,700,400|Roboto:100,400' rel='stylesheet'
          type='text/css'>
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/app.css" rel="stylesheet" type="text/css">
    @yield('head')
    @include('partials._favicon')

    <!--[if lt IE 9]>
    <script src="js/vendor/html5shiv.min.js"></script>
    <![endif]-->
</head>
<body>

@include('partials._header')
@yield('content')
@include('partials._footer')
<script src="js/vendor/jquery-1.11.3.min.js"></script>
@yield('scripts')
</body>