<!DOCTYPE html>
<html>
<head>
    <title>Paugme Packs</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,700,400|Roboto:100' rel='stylesheet'
          type='text/css'>
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/app.css" rel="stylesheet" type="text/css">
    @yield('head')
    @include('_favicon')
</head>
<body>
<header>

</header>

@yield('content')

<footer>
    <h2>Paugme Packs</h2>

    <p>Copyright &copy; 2015 Mantaray AR LLC</p>

    <ul>
        <li><a href="/">Home</a></li>
        <li><a href="/about">About</a></li>
        <li><a href="/blog">Blog</a></li>

    </ul>
</footer>
<script src="js/jquery-1.11.3.min.js"></script>
@yield('scripts')
</body>