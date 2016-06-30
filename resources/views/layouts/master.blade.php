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
            @if(Auth::user())
            {{--Edit Profile Modal--}}
            <div class="modal fade" id="editProfile" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <form method="POST" action="/profile/update/{{ Auth::user()->id }}">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title"><i class="fa fa-fw fa-edit"></i>Edit your profile</h4>
                            </div>
                            <div class="modal-body">

                                {{ csrf_field() }}

                                <div class="form-group">
                                    {{--Fullname--}}
                                    <label>Your fullname:</label>
                                    <input type="text" class="form-control" id="modal-assign-staff" name="fullname" value="{{ Auth::user()->fullname }}">

                                    {{--Email--}}
                                    <label>Your Email:</label>
                                    <input class="form-control" type="email" name="email" value="{{ Auth::user()->email }}" id="modal-assign-staff">

                                    {{--Gender--}}
                                    <label>Gender:</label>
                                    @if(Auth::user()->gender == 'Male')
                                        <input type="radio" name="gender" value="Male" checked> <span style="font-size: 12pt">Male</span>
                                        <input type="radio" name="gender" value="Female" id="gender-select">  <span style="font-size: 12pt">Female</span><br>
                                    @else
                                        <input type="radio" name="gender" value="Male"> <span style="font-size: 12pt">Male</span>
                                        <input type="radio" name="gender" value="Female" checked id="gender-select">  <span style="font-size: 12pt">Female</span><br>
                                    @endif

                                    {{--Password--}}
                                    <label>Change Your Password </label><br>
                                    <label style="font-size: smaller">Enter your current password (required)</label>
                                    <input class="form-control" type="password" name="current_password" required id="modal-assign-staff">
                                    <label style="font-size: small">Enter new password (required)</label>
                                    <input class="form-control" type="password" name="new_password" required id="modal-assign-staff">
                                    <label style="font-size: small">Re-type new password (required)</label>
                                    <input class="form-control" type="password" name="retype" required id="modal-assign-staff">
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Update</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @endif
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