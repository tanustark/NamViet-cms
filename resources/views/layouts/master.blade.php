<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/app2.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/font-awesome.css">
    <script src="/assets/js/app.js"></script>


</head>
<body>

        <div class="top-navbar">
            @yield('top-navbar')
        </div>

        <div class="left-navbar">
            @yield('left-navbar')
        </div>

        <div class="content">
            @yield('content')
        </div>

        <div class="footer">
            @yield('footer')
        </div>

</body>
</html>