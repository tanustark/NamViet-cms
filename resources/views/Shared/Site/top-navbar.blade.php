<nav class="navbar">
        <div class="container">
            <a href="/site">
                <img class="sitename" src="{{ URL::to('/') }}/assets/img/site/logo.png" width="15%" height="15%">
            </a>
            <ul class="nav list-inline">
                <li><a href="#">Item 1</a></li>
                <li><a href="#">Item 2</a></li>
                <li><a href="#">Item 3</a></li>
                <li>
                    <form method="get" action="/site/search">
                        <div class="form-group" id="search-div">
                            <input type="search" class="form-control" id="search-box" name="search_string" placeholder="Type and hit Enter to search ...">
                        </div>
                    </form>
                </li>
                <li><a href="/dashboard">CMS</a></li>
            </ul>
        </div><!-- /.container -->
</nav><!-- /.navbar -->