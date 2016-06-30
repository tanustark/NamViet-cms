<nav class="navbar navbar-fixed-top top-navbar">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" style="color: white" href="{{ url('/') }}">
                Nam Viet CMS
            </a>
        </div>

        <div class="collapse navbar-collapse">
            {{--Left side of navbar--}}
            <ul class="nav navbar-nav" >
                <li>
                    @if(Auth::check())
                            @if(Auth::user()->isAdmin == true)
                                    <a style="color: white" href="#"><i class="fa fa-fw fa-user"></i>&nbsp;Administrator</a>
                            @else
                            <a style="color: white" href="#"><i class="fa fa-fw fa-user"></i>&nbsp;Staff</a>
                            @endif
                        @else
                    <a href="{{ url('/login') }}">Dashboard</a>
                        @endif
                </li>
            </ul>

            {{--Right side of navbar--}}
            <ul class="nav navbar-nav navbar-right">
                {{-- Authentication--}}
                @if (Auth::guest())
                    <li>
                        <a href="{{ url('/login') }}"><i class="fa fa-btn fa-sign-in"></i>
                            Login
                        </a>
                    </li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle"
                           data-toggle="dropdown" role="button"
                           aria-expanded="false">
                            {{ Auth::user()->fullname }}
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ url('/dashboard') }}"><i class="fa fa-btn fa-dashboard"></i>
                                    Dashboard
                                </a>
                            </li>
                            <li>
                                <a data-toggle="modal" data-target="#editProfile"><i class="fa fa-btn fa-user"></i>
                                     Edit Profile
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>
                                    Sign out
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>