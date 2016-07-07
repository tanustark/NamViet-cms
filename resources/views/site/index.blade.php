@extends('layouts.site-layout')

@section('title')
    Site Index
    @endsection

@section('top-navbar')
    @include('Shared.Site.top-navbar')
    @endsection

@section('content')
    <div class="container">
        <div class="col-lg-9 col-lg-offset-1 container">
            <div class="page-wrapper">

                {{--Highlight Section--}}

                @foreach($highlight as $item)
                    <div id="highlightPost">
                        <span class="alert alert-danger" style="font-weight: bold; font-size: 20pt; padding: 10px;">Highlight Post: </span>
                        <img style="width: 823px; height: auto; position: relative" src="{{ URL('/') }}/assets/img/posts/{{ $item->images->imgName }}">
                        <div id="highlightTitle">
                            <h1>
                                <a href="/site/posts/{{ $item->id }}">
                                {{ $item->title }}
                                </a>
                            </h1>

                            <p style="font-weight: normal">
                                Posted by: {{ $item->users->fullname }}
                                &nbsp;&nbsp;
                                Published at: {{ $item->updated_at }}
                            </p>
                        </div>

                        {{--<div id="highlighAuthor">--}}

                        {{--</div>--}}
                    </div><br>
                @endforeach

                @foreach($sitePosts as $sitePost)
                    <div class="panel panel-default">
                            <div class="panel-heading" id="post-heading">
                                <a href="site/posts/{{ $sitePost->id }}">
                                    {{ $sitePost->title }}
                                </a>
                            </div>

                        <div class="author">
                            Posted by: <span style="font-weight: bold">
                                {{ $sitePost->users->fullname }}
                            </span>
                            &nbsp;&nbsp;&nbsp;
                            Published at:<span style="font-weight: bold">
                                {{ date('F d, y', strtotime( $sitePost->created_at))}}
                            </span>
                        </div><hr>

                        <div class="cover">
                            <img class="cover-image img-responsive" src="{{ URL::to('/') }}/assets/img/posts/{{ $sitePost->images->imgName }}">
                        </div>

                        <p class="panel-body" id="post-body">
                            {{ $sitePost->body }}
                        </p>
                    </div>
                @endforeach

                <div class="pagination">
                    {{ $sitePosts->links() }}
                </div>

            </div>
        </div>
    </div>

@endsection
