@extends('layouts.master')

@section('title')
    Confirmation
@endsection

@section('top-navbar')
    @include('Shared.top-navbar')
@endsection

@section('left-navbar')
    @include('Shared.post-left-navbar')
@endsection

@section('content')
    <div class="container">
        <div class="col-md-10">
            <div class="page-wrapper">
                <div class="page-header" style="text-align: center">
                    <h1 style="color: green">Your post is updated succesfully</h1>
                    <p>Click Back To Manage Posts button to go to Manage Posts page</p>
                    <form method="get" action="/posts/manage">
                        {{ csrf_field() }}
                        <div class="button">
                            <button type="submit" class="btn btn-success">Back to All Posts</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection