<nav>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 panel panel-default">
            @if(Auth::user()->isAdmin == false)
            <ul class="nav sidebar">
                <li>
                    <a href="dashboard"><i class="fa fa-btn fa-dashboard"></i>Dashboard</a>
                </li><hr>

                <li>
                    <a href="posts"><i class="fa fa-btn fa-file"></i>Posts</a>
                </li><hr>
                {{--<li><a href="tasks"><i class="fa fa-btn fa-tasks"></i>Tasks</a></li>--}}
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle"
                       data-toggle="dropdown" role="button"
                       aria-expanded="false">
                        <i class="fa fa-fw fa-tasks"></i>
                        Tasks
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ url('/tasks') }}"><i class="fa fa-btn fa-tasks"></i>
                                All Tasks
                            </a>
                        </li><hr>

                        <li>
                            <a href="{{ url('/tasks/mytasks') }}"><i class="fa fa-btn fa-file-archive-o"></i>
                                My Tasks
                            </a>
                        </li><hr>

                    </ul>
                </li><hr>
                <li>
                    <a href="contact"><i class="fa fa-btn fa-phone-square"></i>Contact</a>
                </li><hr>
            </ul>
                @else
                <ul class="nav nav-sidebar navbar-default sidebar">
                    <li>
                        <a href="dashboard"><i class="fa fa-btn fa-dashboard"></i>Dashboard</a>
                    </li><hr>

                    <li>
                        <a href="posts"><i class="fa fa-btn fa-file"></i>Posts</a>
                    </li><hr>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle"
                           data-toggle="dropdown" role="button"
                           aria-expanded="false">
                            <i class="fa fa-fw fa-tasks"></i>
                                Tasks
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ url('/tasks') }}"><i class="fa fa-btn fa-tasks"></i>
                                    All Tasks
                                </a>
                            </li><hr>
                            <li>
                                <a href="{{ url('/tasks/mytasks') }}"><i class="fa fa-btn fa-file-o"></i>
                                    My Tasks
                                </a>
                            </li><hr>
                        </ul>
                    </li><hr>

                    <li>
                        <a href="/staffs"><i class="fa fa-btn fa-users"></i>Staffs</a>
                    </li><hr>
                </ul>
                @endif
        </div>
       </div>
    </div>
</nav>