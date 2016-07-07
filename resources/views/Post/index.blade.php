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
    <div class="col-lg-10 panel panel-default" id="tasks-table" style="float: left">
        <div class="panel-heading">
            <div style="float: right; margin-top: 30px">
                <button class="btn btn-primary" data-toggle="tooltip" title="Edit this post" onclick="managePostButtonPressed()"><i class="fa fa-tasks"></i> Manage Posts</button>
            </div>
            <h1>Recent Posts</h1>
            <p>*All recent posts go here ordered by last modified</p>
        </div>
        <table class="table table-hover table-responsive tasks-table">
            <thead>
            <tr>
                <th>Title</th>
                <th>Posted By</th>
                <th>Email</th>
                <th>Last Modified</th>
                <th>Status</th>

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
                        @elseif($post->isAccepted == true)
                            <strong class="alert alert-success" style="color: #fff;">
                                Published
                            </strong>
                        @elseif($post->isHighlight == true && $post->isAccepted == true)
                            <strong class="alert alert-info" style="color: #fff;">
                                Highlighted
                            </strong>
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    @endsection

@section('footer')
    @endsection