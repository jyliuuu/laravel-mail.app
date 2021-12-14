@extends('master')
<?php
    $x = 1; //0 = not mail template -- 1 = yes mail template = yes navbar gone
?>

@section('content')
    <h1>Subject: <strong>{{ $details['title'] }}.</strong></h1>
    <p>Hello,</p>
    @isset($details['reasoning'])
        @if (is_null($details['reasoning']))
            <br>
        @else
            <p>I decided to write an email to you because I wanted to <strong>{{ $details['reasoning'] }}.</strong></p>
        @endif
    @endisset
    <p>{{ $details['message'] }}.</p>
    <br>
    <p>It will be helpful if you give me a response soon.</p>
    <br>
    <p>Kind regards,<br>
    {{ $details['name'] }}<br>
        <strong>Sent from Laravel Email App by jyliu</strong></p>

@endsection
