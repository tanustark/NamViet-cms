@extends('layouts.site-layout')

@section('title')
    Search result
@endsection

@section('top-navbar')
    @include('Shared.Site.top-navbar')
    @endsection

@section('content')

    <div class="container">
        <div class="col-lg-9 col-lg-offset-1 container">
            <div class="page-wrapper">
                <div class="panel panel-default">
                    <h1 class="panel-heading">Search Results:</h1>
                    <div class="panel-body">
                        @foreach($results as $result)
                            <ul class="list-group">
                                <li class="list-group-item" id="searchResult">
                                    <a style="font-size: 14pt; font-weight: bold" href="posts/{{ $result->id }}">{{ $result->title }}</a>
                                    <p id="searchResultBody">{{ $result->body }}</p>
                                </li>
                            </ul>
                        @endforeach
                        @if($results == [])
                            <li class="list-group-item" style="text-align: center">
                                There is no result
                            </li>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
