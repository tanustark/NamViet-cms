    <div class="col-md-2">
            <ul class="list-group-item">
                {{--Create New Post Button--}}
                <li>
                    <button class="btn btn-success" style="width: 100%; height: 50px"><a href="/posts/create" style="color: white; font-size: 14pt"><i class="fa fa-fw fa-plus-circle"></i>&nbsp;&nbsp;Create New Post</a>
                    </button>
                </li>
                {{--All Posts Button--}}
                <li>
                    <a href="/posts"><i class="fa fa-fw fa-file"></i>&nbsp;&nbsp;All Post</a>
                </li>
                {{--Manage Posts Button--}}
                <li>
                    <a href={{ URL::to('posts/manage') }}><i class="fa fa-fw fa-tasks"></i>&nbsp;&nbsp;Manage Posts</a>
                </li>
                {{--My Post Button--}}
                <li>
                    <a href="/posts/myposts"><i class="fa fa-fw fa-th-large"></i>&nbsp;&nbsp;My Posts</a>
                </li>
            </ul>
    </div>

