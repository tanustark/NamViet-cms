<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            @if($user->isAdmin == false)
            <ul class="nav nav-sidebar navbar-default sidebar">
                <li><a href="dashboard"><i class="fa fa-btn fa-dashboard"></i>Dashboard</a></li>
                <li><a href="posts"><i class="fa fa-btn fa-file"></i>Posts</a></li>
                <li><a href="tasks"><i class="fa fa-btn fa-tasks"></i>Tasks</a></li>
                <li><a href="contact"><i class="fa fa-btn fa-phone-square"></i>Contact</a></li>
            </ul>
                @else
                <ul class="nav nav-sidebar navbar-default sidebar">
                    <li><a href="dashboard"><i class="fa fa-btn fa-dashboard"></i>Dashboard</a></li>
                    <li><a href="posts"><i class="fa fa-btn fa-file"></i>Posts</a></li>
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
                                <a href="/admin/tasks/add"><i class="fa fa-btn fa-plus"></i>
                                    Add New Task
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/admin/tasks/manage') }}"><i class="fa fa-btn fa-sign-out"></i>
                                    Manage Tasks
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle"
                           data-toggle="dropdown" role="button"
                           aria-expanded="false">
                           <i class="fa fa-users"></i>
                            Staff
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="/admin/staffs/add"><i class="fa fa-btn fa-plus"></i>
                                    Add New Task
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/admin/staff/manage') }}"><i class="fa fa-btn fa-users"></i>
                                    Manage Staff
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                @endif
        </div>
       </div>
    </div>