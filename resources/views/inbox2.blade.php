@extends('master')

@section('content')
    <?php
    $x = 0;
    // Connect to server imap.gmail.com via SSL on port 993 and open the 'INBOX' folder
    // Authenticate with the username / email address 'some@gmail.com'
    // Save attachments to the directory '__DIR__'
    // Set server encoding to 'US-ASCII'
    $mailbox = new PhpImap\Mailbox(
        '{imap.gmail.com:993/imap/ssl}INBOX', // IMAP server and mailbox folder
        $_ENV['IMAP_USERNAME'], // Username for the before configured mailbox
        $_ENV['IMAP_PASSWORD'], // Password for the before configured username
        __DIR__, // Directory, where attachments will be saved (optional)
        'US-ASCII', // Server encoding (optional)
    );

    try {
        // Search in mailbox folder for specific emails
        // PHP.net imap_search criteria: http://php.net/manual/en/function.imap-search.php
        // Here, we search for "all" emails
        $mails_ids = $mailbox->searchMailbox('ALL');
    } catch (PhpImap\Exceptions\ConnectionException $ex) {
        echo 'IMAP connection failed: ' . $ex;
        die();
    }

    // Change default path delimiter '.' to '/'
    $mailbox->setPathDelimiter('/');

    // Switch server encoding
    $mailbox->setServerEncoding('UTF-8');

    // Change attachments directory
    // Useful, when you did not set it at the beginning or
    // when you need a different folder for eg. each email sender
    //$mailbox->setAttachmentsDir('/var/www/example.com/ticket-system/imap/attachments');

    // Disable processing of attachments, if you do not require the attachments
    // This significantly improves the performance
    $mailbox->setAttachmentsIgnore(true);

    // Loop through all emails
    foreach (array_reverse($mails_ids) as $mail_id) {
        // Just a comment, to  see, that this is the begin of an email
        echo "+------ P A R S I N G ------+\n";

        // Get mail by $mail_id
        $email = $mailbox->getMail(
            $id, // ID of the email, you want to get
            false, // Do NOT mark emails as seen
        );

        print_r($mailbox);

        echo 'mail has attachments? ';
        if ($email->hasAttachments()) {
            echo "Yes\n";
        } else {
            echo "No\n";
        }
        if (!empty($email->getAttachments())) {
            echo count($email->getAttachments()) . ' attachements';
        }
        if ($email->textHtml) {
            echo "Message HTML:\n" . $email->textHtml;
        } else {
            echo "Message Plain:\n" . $email->textPlain;
        }

        if (!empty($email->autoSubmitted)) {
            // Mark email as "read" / "seen"
            $mailbox->markMailAsRead($mail_id);
            echo '+------ IGNORING: Auto-Reply ------+';
        }

        if (!empty($email->precedence)) {
            // Mark email as "read" / "seen"
            $mailbox->markMailAsRead($mail_id);
            echo '+------ IGNORING: Non-Delivery Report/Receipt ------+';
        }
    }

    // Disconnect from mailbox
    $mailbox->disconnect();
    ?>
@endsection
