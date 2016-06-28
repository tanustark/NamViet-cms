<nav class="navbar navbar-fixed-top navbar-default">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="{{ url('/') }}">
                Nam Viet CMS
            </a>
        </div>

        <div class="collapse navbar-collapse">
            {{--Left side of navbar--}}
            <ul class="nav navbar-nav">
                <li>
                    <a href="{{ url('/dashboard') }}">Dashboard</a>
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
                                <a href="/profile"><i class="fa fa-btn fa-user"></i>
                                    Profile
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