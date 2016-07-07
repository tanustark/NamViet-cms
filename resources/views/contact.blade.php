@extends('layouts.master')

@section('title')
    Contact
@endsection

@section('top-navbar')
    @include('Shared.top-navbar')
@endsection

@section('left-navbar')
    @include('Shared.left-navbar')
@endsection

@section('content')

    <div class="col-lg-10 panel panel-default">
        <h1 class="panel-heading">Contact</h1>
        <div class="col-lg-3" style="padding-top: 20px" id="contact-img">
            <img src="./assets/img/person-placeholder.jpg" width="240" height="240">
        </div>
        <div class="col-lg-4">
            <h3 style="padding-left: 15px">General Director</h3>
            <ul class="list-group" style="line-height: 30px; font-size: 12pt">
                <li class="list-group-item"><i class="glyphicon glyphicon-user"></i>
                    Mr. Nguyen Minh Viet
                </li>

                <li class="list-group-item"><i class="glyphicon glyphicon-envelope"></i>
                    minhvietnguyen65@gmail.com
                </li>

                <li class="list-group-item"><i class="glyphicon glyphicon-phone"></i>
                    (+84) 988 898 988
                </li>

                <li class="list-group-item"><i class="fa fa-twitter"></i>
                    minhvietng65
                </li>

            </ul>
        </div>
        <div class="col-lg-4" style="margin-left: 50px">
            <h3 style="padding-left: 15px">Nam Viet., JSC</h3>
            <ul class="list-group" style="line-height: 23px; font-size: 12pt">
                <li class="list-group-item" style="text-wrap: normal;"><i class="glyphicon glyphicon-map-marker"></i>247/32 Nguyen Chi Thanh Street - Cau Giay District - Ha Noi </li>
                <li class="list-group-item"><i class="glyphicon glyphicon-envelope"></i>support@namviet.com</li>
                <li class="list-group-item"><i class="glyphicon glyphicon-phone"></i>(043) 756 6476 / (043) 756 6478</li>
                <li class="list-group-item"><i class="fa fa-fax"></i>(043) 756 6476 / (043) 756 6478</li>

            </ul>
        </div>
    </div>

    @endsection