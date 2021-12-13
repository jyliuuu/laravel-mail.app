@extends('master')
<?php
    $x = 0; //0 = not mail template -- 1 = yes mail template = yes navbar gone
?>
@section('content')
<head>
    <title>Contact Us Form</title>
</head>
<body class="body-l">
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
                        <p><strong>{{ $message }}</strong></p>
                    </div>
                </div>
        @endif
        <div data-aos="zoom-in-down" data-aos-duration="450">
            <h1><strong>Contact Me</strong></h1>
            <p class="text-muted">The submit button is under the form, it will pop up once it's viewable.</p>
        </div>
    </div>
    <br>
    <div class="container">
        <!--
        this forms action pretty much leads to
        -> web.php dir - '/send.mail' route
        -> EmailSenderController - in the send() public func - controlling data -> redirects to sendingEmail
        -> sendingEmail - __construct && build()
        -> email-content = the text in the generated mail -> done.
        -->
        <form action="{{ url('send/mail') }}" method="POST">
            {{ csrf_field() }}
            <div data-aos="zoom-in-up" data-aos-duration="500">
                <div class="form-group">
                    <label for="name">Your Full Name</label><br>
                    <input type="text" name="name" style="min-width: 100%; text-transform: capitalize;">
                    <p class="text-muted">It is always good to let the receiver know, who's contacting them.</p>
                </div>
                <div class="form-group">
                    <label for="email">Receiver's Email</label><br>
                    <input type="email" name="email" style="min-width: 100%">
                    <p class="text-muted">The person's email address, so that the receiver can <strong>receive</strong> it.</p>
                </div>
                <div class="form-group">
                    <label for="title">Email Topic</label><br>
                    <input type="text" name="title" style="min-width: 100%">
                    <p class="text-muted">What is the email about?</p>
                </div>
            </div>
            <div data-aos="zoom-in-up" data-aos-duration="600">
                <div class="form-group">
                    <label for="message">Content</label><br>
                    <textarea class="text-area text-box multi-line" style="text-transform: capitalize;" name="message" data-val="true" data-val-length="Maximum = 2045 characters" data-val-length-max="2045" id="info" name="info" cols="148" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <label for="reasoning">Reasoning</label>
                    <select class="form-control" name="reasoning" id="exampleFormControlSelect2">
                        <option>ask a question</option>
                        <option>make a request</option>
                        <option>purpose a business meeting</option>
                        <option>declare something privately</option>
                    </select>
                    <p class="text-muted">Give a reason why you're contacting me.</p>
                </div>
            </div>
            <div data-aos="zoom-in-up" data-aos-duration="700">
                <input type="submit" class="btn btn-success" value="Send"/>
            </div>
        </form>
    </div>
</body>

@endsection
