<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/site.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/font-awesome.css">
    <script src="/assets/js/app.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>

</head>
<body>

{{--Top navbar--}}
        @yield('top-navbar')

        @yield('content')



</body>
</html>