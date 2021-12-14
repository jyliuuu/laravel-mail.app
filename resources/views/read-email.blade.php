@extends('master')

@section('content')
<?php
$x = 0; //0 = not mail template -- 1 = yes mail template = yes navbar gone

// Get mail by $mail_id
$email = $mailbox->getMail(
    $id, // ID of the email, you want to get
    false // Do NOT mark emails as seen
);
?>
<body class="body-l">
    <div class="container">
        <div class="row email-border" data-aos="zoom-in-down" data-aos-duration="350">
            <div class="col-12 col-md">
                <h2 class="email-date text-muted">From:</h2>
                <h2 class="email-header">
                    {{ $email->fromName }} ({{ $email->fromAddress }})
                </h2>
                <h2 class="email-date text-muted">To:</h2>
                <h2 class="email-header">
                    {{ $email->toString }}
                </h2>
                <h2 class="email-date text-muted">Sent @:</h2>
                <h2 class="email-header">
                    {{ $email->headers->date, 0}}
                </h2>
                <h2 class="email-date text-muted">Subject:</h2>
                <h1 class="email-content3">{{ $email->subject }}</h1>
            </div>
            <div class="col-12 col-md-auto">
                <div>
                </div>
            </div>
        </div>
        <div class="fs-xs"></div>
        <div class="row email-border" data-aos="zoom-in-up" data-aos-duration="450">
            <div class="col-12 col-md">
                <h2 style="font-size: 200%; word-wrap: break-word">
                    <?php
                    if($email->textHtml) {
                        echo $email->textHtml;
                    } else {
                        echo $email->textPlain;
                    }
                    ?>
                </h2>
            </div>
        </div>
        <div class="fs-xs"></div>
        <div class="row reply-border" data-aos="fade-up" data-aos-duration="200">
            <div class="container">
                <div class="col-12 col-md">
                    <form action="{{ url('send/reply') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Reply to {{ $email->fromAddress }} <strong>
                                    (as {{ $email->toString }}):</strong></label>
                            <br>

                            <div class="form-group">
                                <label for="title">Email Subject</label><br>
                                <input type="text" name="title" class="form-control"
                                       style="min-width: 100%" value="RE: {{ $email->subject }}">
                            </div>

                            <div class="d-table-cell w-100">
                                <label for="message">Content</label><br>
                                <textarea class="text-area text-box multi-line" name="message" data-val="true"
                                          data-val-length="Maximum = 2045 characters" data-val-length-max="2045"
                                          id="info" name="info" cols="125" rows="10"></textarea>
                            </div>
                            <div class="d-table-cell align-middle">
{{--                                input hidden .name moet later een auth:logged-in user full name hebben uit DB--}}
                                <input type="hidden" name="name" value="{{ $email->toString }}">
                                <input type="hidden" name="email" value="{{ $email->fromAddress }}">
                                <button type="submit" class="btn-lg btn-dark"><i class="fas fa-reply"></i></button>
                            </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

<?php
    // Disconnect from mailbox
    $mailbox->disconnect();
?>
@endsection
