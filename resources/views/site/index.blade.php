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
                @foreach($posts as $post)
                    <div class="panel panel-default">
                        <div class="panel-heading" id="post-heading"><a href="site/posts/{{ $post->id }}">{{ $post->title }}</a></div>
                        div class="author">Posted by: <span style="font-weight: bold">{{ $post->users->fullname }}</span>  &nbsp;&nbsp;&nbsp;Published at: <span style="font-weight: bold">{{ $post->created_at }}</span></div><hr>
                        <div class="cover">
                            <img class="cover-image img-responsive" src="./assets/img/posts/{{ $post->images->imgName }}">
                        </div>
                        <p class="panel-body" id="post-body">
                            {{ $post->body }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
