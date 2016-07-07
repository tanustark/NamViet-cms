@extends('layouts.master')

@section('title')
    Manage Post
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
        <h1>Manage Posts</h1>
        <p>*Administrator can manage posts in here</p>
    </div>
    <table class="table table-hover table-responsive tasks-table">
        <thead>
        <tr>
            <th>Title</th>
            <th>Posted By</th>
            <th>Email</th>
            <th>Last Modified</th>
            <th>Status</th>
            <th>Actions</th>

        </tr>
        </thead>
        <tbody>
        @foreach( $posts as $post)
            @if($post->count() == 0)
                <p>There is no post yet</p>
            @endif
            <tr>
                <td id="postTitle">
                    <a href="/posts/{{ $post->id }}">
                    {{ $post->title }}
                    </a>
                </td>
                <td>{{ $post->users->fullname }}</td>
                <td>{{ $post->users->email }}</td>
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


                </td>
                <td>
                    <button class="btn btn-info" data-toggle="tooltip" title="Edit this post" onclick="editPostButtonPressed({{ $post->id }})">Edit</button>

                    @if($post->isAccepted == false)
                        <button class="btn btn-success" data-toggle="tooltip" title="Publish this post to Main Site" onclick="acceptPostButtonPressed({{ $post->id }})">
                            Publish
                        </button>


                    @elseif($post->isAccepted == true && $post->isHighlighted == false)
                        <button class="btn btn-danger" data-toggle="tooltip" title="Remove this post from Main Site" onclick="removePostButtonPressed({{ $post->id }})">
                            Remove
                        </button>

                            <div style="margin-top: 5px;">
                                <button class="btn btn-primary" data-toggle="tooltip" title="Make this post highlight" onclick="highlightPostButtonPressed({{ $post->id }})">
                                    <i class="fa fa-magic"></i>
                                    Make Highlight
                                </button>
                            </div>

                        @elseif($post->isAccepted == true && $post->isHighlighted == true)
                            <button class="btn btn-danger" data-toggle="tooltip" title="Remove this post from Main Site" onclick="removePostButtonPressed({{ $post->id }})">
                                Remove
                            </button>

                    @endif



                </td>
            </tr>
        @endforeach
    </table>
</div>
    @endsection