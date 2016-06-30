@extends('layouts.master')

@section('title')
    {{ $post->title }}
@endsection

@section('top-navbar')
    @include('Shared.top-navbar')
@endsection

@section('left-navbar')
    @include('Shared.post-left-navbar')
@endsection

@section('content')
    <div class="container">
        <div class="col-lg-9 container panel panel-default">
            <div class="page-wrapper">
                    <h1 class="panel-heading">{{ $post->title }}</h1><hr>
                        <div class="author">Posted by: {{ $user->fullname }} &nbsp;&nbsp;&nbsp;Published at: {{ $post->created_at }}</div><hr>
                        <div class="row">
                            <div class="panel-body">
                                <p id="post-body-full">{{ $post->body }}</p>
                            </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer')
@endsection