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
        <div class="col-lg-9" style="padding-bottom: 100px">
            <div class="panel panel-default">
                <div class="page-wrapper">
                    <h1 class="panel-heading">{{ $post->title }}</h1><hr>
                        <div class="author">Posted by: {{ $post->users->fullname }} &nbsp;&nbsp;&nbsp;Last modified: {{ date('F d, Y', strtotime($post->updated_at)) }}</div><hr>
                        <div class="cover">
                            <img class="cover-image" src="{{ URL::to('/') }}/assets/img/posts/{{ $post->images->imgName }}">
                        </div>
                        <div class="panel-body">
                           <p id="post-body-full">{{ $post->body }}</p>
                        </div>
                </div>
            </div>

            {{--Comment Section--}}
            <div class="comment-section form-group">
                <form method="post" action="/posts/{{ $post->id }}/comment">
                    {{ csrf_field() }}
                <label for="comment">Comment</label>
                <textarea type="text" class="form-control" name="comment" id="cmtsec" required></textarea><br>
                    <button class="btn btn-success">Add Comment</button>
                    </form>

                    {{--Comments--}}
                <ul class="list-group"><br>
                    @foreach($comments as $comment)
                    <li class="list-group-item">

                        @if($comment->users->email == Auth::user()->email)
                            <span style="font-weight: bold; color: #2ca02c">
                                {{ $comment->users->fullname }}
                            </span>
                            <span style="padding-left: 15px;">
                                {{ $comment->body }}
                            </span>

                            <span style="float: right;">
                                <button data-toggle="modal" data-target="#editComment{{ $comment->id }}" class="fa fa-btn fa-edit"></button>
                            </span>

                        {{--Edit Comment Modal--}}
                        <div class="modal fade" id="editComment{{ $comment->id }}" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <form method="POST" action="/comments/{{ $comment->id }}/edit">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title"><i class="fa fa-fw fa-edit"></i> Edit Comment</h4>
                                        </div>

                                        <div class="modal-body">

                                            {{ csrf_field() }}

                                            <div class="form-group">
                                                {{--Task Title--}}
                                                <label>Comment:</label>
                                                <textarea type="text" class="form-control" name="comment" id="cmtsec">{{ $comment->body }}</textarea>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success">Edit</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="button" onclick="commentDeleteButtonPressed({{ $comment->id }})" class="glyphicon glyphicon-trash btn btn-danger" style="float: left" id="take-action-button"></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                            @else
                            <span style="font-weight: bold; color: #2ca02c">{{ $comment->users->fullname }}</span> <span style="padding-left: 15px;">{{ $comment->body }}</span>
                        @endif
                    </li>
                        @endforeach

                    <div class="pagination">
                        {{ $comments->links() }}
                    </div>

                </ul>
                </form>
            </div>

        </div>
    </div>

@endsection

@section('footer')
@endsection