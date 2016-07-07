@extends('layouts.master')

@section('title')
    My Post
@endsection

@section('top-navbar')
    @include('Shared.top-navbar')
@endsection

@section('left-navbar')
    @include('Shared.post-left-navbar')
@endsection

@section('content')
    <div class="col-lg-10 panel panel-default" id="tasks-table" style="float: left">
        <div class="panel-heading">
            <h1>My Posts</h1>
            <p>*All of your own posts go here</p>
        </div>

        <table class="table table-hover table-responsive tasks-table">
            <thead>
            <tr>
                <th>Title</th>
                <th>Posted By</th>
                <th>Email</th>
                <th>Last Modified</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach( $posts as $post)
                <tr>
                    <td id="postTitle"><a href="/posts/myposts/{{ $post->id }}">{{ $post->title }}</a></td>
                    <td>{{ $user->fullname }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ date('F d, Y', strtotime($post->updated_at)) }}</td>
                    <td style="padding-top: 20px">
                        @if($post->isAccepted == false)
                            <strong class="alert alert-warning" style="color: #efa231;">
                                Pending
                            </strong>
                        @endif

                        @if($post->isAccepted == true && $post->isHighlighted == false)
                            <strong class="alert alert-success" style="color: #fff;">
                                Published
                            </strong>
                        @endif

                        @if($post->isAccepted == true && $post->isHighlighted == true)
                            <strong class="alert alert-info" style="color: #fff;">
                                Highlighted
                            </strong>
                        @endif
                    </td>Action
                    <td>
                        <button class="btn btn-info" data-toggle="tooltip" title="Edit this post" onclick="editMyPostButtonPressed({{ $post->id }})">Edit</button>

                        <button class="btn btn-danger" data-toggle="tooltip" title="Delete this post" onclick="deleteMyPostButtonPressed({{ $post->id }})">Delete</button>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection