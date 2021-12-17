@extends('master')
<?php
$x = 0; //0 = not mail template -- 1 = yes mail template = yes navbar gone
?>
@section('content')
    <div class="fs-s"></div>

    <body class="body-m">
        <div class="container" style="width:65%">
            @if (count($errors) > 0)
                <div data-aos="zoom-in-down" data-aos-duration="550">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
            @if ($message = Session::get('success'))
                <div data-aos="zoom-in-down" data-aos-duration="550">
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                </div>
            @endif
            <div data-aos="fade-down" data-aos-duration="450">
                <h1 class="home-header"><strong>Send emails,<br>
                        simple & easy.</strong></h1>
                <div class="fs-s"></div>
                <p class="text-muted">It's shouldn't be any harder than it already is.</p>
            </div>
        </div>

        <div class="container">

        </div>
    </body>

@endsection
