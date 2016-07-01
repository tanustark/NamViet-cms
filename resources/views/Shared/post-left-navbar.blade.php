<nav class="col-lg-12">
    <div class="container-fluid">
        <div class="row">
                <ul class="nav nav-sidebar navbar-default sidebar">
                    <li>
                        <a href="/posts/create" style="color: white; font-size: 14pt"><i class="fa fa-fw fa-plus-circle"></i>&nbsp;&nbsp;Create New Post</a>
                    </li>

                    {{--Dashboard Button--}}
                    <li>
                        <a href="/dashboard"><i class="fa fa-fw fa-dashboard"></i>&nbsp;&nbsp;Dashboard</a>
                    </li>
                    {{--All Posts Button--}}
                    <li>
                        <a href="/posts"><i class="fa fa-fw fa-file"></i>&nbsp;&nbsp;All Post</a>
                    </li>
                    {{--Manage Posts Button--}}
                    @if(Auth::user()->isAdmin == true)
                    <li>
                        <a href={{ URL::to('posts/manage') }}><i class="fa fa-fw fa-tasks"></i>&nbsp;&nbsp;Manage Posts</a>
                    </li>
                    @endif
                    {{--My Post Button--}}
                    <li>
                        <a href="/posts/myposts"><i class="fa fa-fw fa-th-large"></i>&nbsp;&nbsp;My Posts</a>
                    </li>
                </ul>

        </div>
    </div>
</nav>