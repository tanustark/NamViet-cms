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
        <div class="col-lg-9 container">
            <div class="page-wrapper">
                    <h1 class="page-header">{{ $post->title }}</h1>
                        <div class="author">Posted by: {{ $user->fullname }} &nbsp;&nbsp;&nbsp;Published at: {{ $post->created_at }}</div><hr>
                        <div class="row">
                            <div>
                                <p id="post-body-full">{{ $post->body }}</p>
                            </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer')
@endsection