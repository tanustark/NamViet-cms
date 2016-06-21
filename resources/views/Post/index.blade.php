@extends('layouts.master')

@section('title')
    Post Index
    @endsection

@section('top-navbar')
    @include('Shared.top-navbar')
    @endsection

@section('left-navbar')
    @include('Shared.post-left-navbar')
    @endsection

@section('content')
    <div class="container">
        <div class="col-md-10 col-md-offset-1">
            <div class="page-wrapper">
                <div class="jumbotron">
                    <h1>Recent Posts</h1>
                    <p>All of your recent posts go here</p>
                </div>
                    @foreach($posts as $post)
                            <div class="panel panel-default">
                                <div class="panel-heading"><a href="posts/{{ $post->id }}">{{ $post->title }}</a></div>
                                <div class="author">Posted by: {{ $user->fullname }} &nbsp;&nbsp;&nbsp;Published at: {{ $post->created_at }}</div><hr>
                                <p class="panel-body">
                                    {{ $post->body }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

    @endsection

@section('footer')
    @endsection