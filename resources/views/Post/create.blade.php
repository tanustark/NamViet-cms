@extends('layouts.master')

@section('title')
    Create New Post
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
                    <h1>Create New Post</h1>
                    <p>*You need to fill in all fields to create a new post</p>
                </div>

                <form method="POST" enctype="multipart/form-data" action="confirm">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="text" class="form-control" name="title" placeholder="Enter the title of the post" required>
                    </div>
                    <div class="form-group">
                        <label for="image_file">Cover Image</label>
                        <input type="file" id="image_file" name="image_file"  value="{{ old('image_file')}}" required>
                        <p class="help-block">This is image will be shown as your post's cover image.</p>
                    </div>
                    <div class="form-group">
                        <textarea type="text" class="form-control" name="body" placeholder="Enter the body of the post" required></textarea>
                    </div>
                    <div class="button">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <button type="reset" class="btn btn-primary">Reset</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection