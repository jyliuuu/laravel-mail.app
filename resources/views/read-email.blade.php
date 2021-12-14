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
<div class="container">
    <div class="row email-border">
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
                    {{ substr($email->headers->date, 0, -5)}}
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
    <div class="row email-border">
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

</div>
<?php
    // Disconnect from mailbox
    $mailbox->disconnect();
?>
@endsection
