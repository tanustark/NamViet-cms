{{--<nav class="col-lg-12">--}}
<nav>
    <div class="container-fluid">
        <div class="row panel panel-default">
                <ul class="nav sidebar">
                    <li>
                        <button class="btn btn-success" data-toggle="tooltip" title="Create new post" id="createPostButton" onclick="createPostButtonPressed()"><i class="fa fa-plus"></i> Create New Post</button>
                    </li><hr>

                    {{--Dashboard Button--}}
                    <li>
                        <a href="/dashboard"><i class="fa fa-fw fa-dashboard"></i>&nbsp;&nbsp;Dashboard</a>
                    </li><hr>
                    {{--All Posts Button--}}
                    <li>
                        <a href="/posts"><i class="fa fa-fw fa-file"></i>&nbsp;&nbsp;All Post</a>
                    </li><hr>
                    {{--Manage Posts Button--}}
                    @if(Auth::user()->isAdmin == true)
                    <li>
                        <a href={{ URL::to('posts/manage') }}><i class="fa fa-fw fa-tasks"></i>&nbsp;&nbsp;Manage Posts</a>
                    </li><hr>
                    @endif
                    {{--My Post Button--}}
                    <li>
                        <a href="/posts/myposts"><i class="fa fa-fw fa-th-large"></i>&nbsp;&nbsp;My Posts</a>
                    </li><hr>
                </ul>

        </div>
    </div>
</nav>