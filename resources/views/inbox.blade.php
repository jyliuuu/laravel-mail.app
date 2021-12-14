@extends('master')

<?php
$x = 0; //0 = not mail template -- 1 = yes mail template = yes navbar gone
?>
@section('content')
    <head>
        <title>Contact Us Form</title>
    </head>
    <div class="fs-m"></div>
    <body class="body-l">
        <div class="container">
            <div data-aos="zoom-in-down" data-aos-duration="700">
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
                <h1><strong>Inbox</strong></h1>
            </div>
            <br>
                @if (isset($mails_ids))
                    @foreach(array_reverse($mails_ids) as $mail_id)
                        @if (isset($mailbox))
                        <?php
                        $email = $mailbox->getMail(
                            $mail_id, // ID of the email, you want to get
                            false // Do NOT mark emails as seen
                        );
                        ?>
                        @endif
                            <div class="row email-border">
                                <div class="col-12 col-md">
                                    <h2 class="email-header">
                                        <a href="{{ action('InboxController@show', $email->id) }}">
                                            {{ $email->fromName }}
                                        </a>
                                    </h2>
                                    <h2 class="email-date text-muted">{{ $email->headers->date}}</h2>
                                </div>
                                <div class="col-12 col-md-auto">
                                    <div>
                                        <p class="email-content">{{ $email->subject }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="fs-xs"></div>
                    @endforeach
                @endif
            </div>
        </div>
    </body>
@endsection
