@extends('master')

@section('content')
<head>
    <title>Contact Us Form</title>
</head>
<body>
<br />
<br />
<br />
<div class="container" style="width:65%">
    <h1><strong>Contact Me</strong></h1>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
</div>
<br>
<div class="container div_border">
    <form action="{{ url('send/mail') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Your Full Name</label><br>
            <input type="text" name="name" style="min-width: 100%" placeholder="Enter your full name    ">
        </div>
        <div class="form-group">
            <label for="email">Email</label><br>
            <input type="email" name="email" style="min-width: 100%" placeholder="Enter email address">
        </div>
        <div class="form-group">
            <label for="message">Content</label>
            <textarea class="text-area text-box multi-line" name="message" placeholder="Enter content here" data-val="true" data-val-length="Maximum = 2045 characters" data-val-length-max="2045" id="info" name="info" cols="136" rows="10"></textarea>

        </div>

        <input type="submit" class="btn btn-success" value="Send"/>
    </form>
</div>
</body>
@endsection
