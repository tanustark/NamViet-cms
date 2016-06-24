@extends('layouts.master')

@section('title')
    Edit Post
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
                <div class="page-header" style="text-align: center">
                    <h1>Edit Your Post</h1>
                    <p>*You can edit your post here</p>
                </div>

                <form method="POST" action="/myposts/{{ $post->id }}/update">
                    {{--{{ method_field('PATCH') }}--}}
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="text" class="form-control" name="title" value="{{ $post->title }}">
                    </div>
                    <div class="form-group">
                        <textarea type="text" class="form-control" name="body">{{ $post->body }}</textarea>
                    </div>
                    <div class="button">
                        <button type="submit" class="btn btn-success">Update</button>
                        <a href="myposts" class="btn btn-primary" role="button">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection