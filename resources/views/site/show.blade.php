@extends('layouts.site-layout')

@section('title')
    {{ $post->title }}
    @endsection

@section('top-navbar')
    @include('Shared.Site.top-navbar')
    @endsection

@section('content')
    <div class="container">
        <div class="col-lg-9 col-lg-offset-1 container">
            <div class="page-wrapper"></div>
                <div class="panel panel-default">
                    <div class="page-wrapper">
                        <h1 class="panel-heading">
                            {{ $post->title }}
                        </h1><hr>

                        <div class="author">Posted by:
                            <span style="font-weight: bold">
                                {{ $post->users->fullname }}
                            </span>
                            &nbsp;&nbsp;&nbsp;
                            Published at:
                            <span style="font-weight: bold">
                                {{ date('F d, Y', strtotime($post->updated_at)) }}
                            </span>
                        </div><hr>

                        <div class="cover">
                            <img class="cover-image img-responsive" src="{{ URL::to('/') }}/assets/img/posts/{{ $post->images->imgName }}">
                        </div>

                        <div class="panel-body">
                            <p id="post-body-full">{{ $post->body }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection