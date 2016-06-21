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
        <div class="col-md-8 col-md-offset-1">
            <div class="page-wrapper">
                    <h1 class="page-header">{{ $post->title }}</h1>
                    <p style="border-bottom: medium; font-weight: bold">published at: {{ $post->created_at }}</p>
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