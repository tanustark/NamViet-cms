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
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


</head>
<body>

        <div class="top-navbar">
            @yield('top-navbar')
        </div>
        <div class="row" style="margin-top: 100px">
            <div class="left-navbar col-lg-2">
                @yield('left-navbar')
            </div>

            <div class="content col-lg-10">
                @yield('content')
            </div>
        </div>

        <div class="footer">
            @yield('footer')
        </div>

</body>
</html>