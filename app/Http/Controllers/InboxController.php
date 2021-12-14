<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpImap\Mailbox;
use PhpImap\Exceptions\ConnectionException;

class InboxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Connect to server imap.gmail.com via SSL on port 993 and open the 'INBOX' folder
        // Authenticate with the username / email address 'some@gmail.com'
        // Save attachments to the directory '__DIR__'
        // Set server encoding to 'US-ASCII'
        $mailbox = new Mailbox(
            '{imap.gmail.com:993/imap/ssl}INBOX', // IMAP server and mailbox folder
            $_ENV['IMAP_USERNAME'], // Username for the before configured mailbox
            $_ENV['IMAP_PASSWORD'], // Password for the before configured username
            __DIR__, // Directory, where attachments will be saved (optional)
            'US-ASCII', // Server encoding (optional)
            sys_get_temp_dir() // Directory, where attachments will be saved (optional)
        );

        try {
            // Search in mailbox folder for specific emails
            // PHP.net imap_search criteria: http://php.net/manual/en/function.imap-search.php
            // Here, we search for "all" emails
            $mails_ids = $mailbox->searchMailbox('ALL');
        } catch(ConnectionException $ex) {
            echo "IMAP connection failed: " . $ex;
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

        return view('inbox', ["mails_ids"=>$mails_ids], ['mailbox'=>$mailbox]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Connect to server imap.gmail.com via SSL on port 993 and open the 'INBOX' folder
        // Authenticate with the username / email address 'some@gmail.com'
        // Save attachments to the directory '__DIR__'
        // Set server encoding to 'US-ASCII'
        $mailbox = new Mailbox(
            '{imap.gmail.com:993/imap/ssl}INBOX', // IMAP server and mailbox folder
            $_ENV['IMAP_USERNAME'], // Username for the before configured mailbox
            $_ENV['IMAP_PASSWORD'], // Password for the before configured username
            __DIR__, // Directory, where attachments will be saved (optional)
            'US-ASCII', // Server encoding (optional)
            sys_get_temp_dir() // Directory, where attachments will be saved (optional)
        );

        try {
            // Search in mailbox folder for specific emails
            // PHP.net imap_search criteria: http://php.net/manual/en/function.imap-search.php
            // Here, we search for "all" emails
            $mails_ids = $mailbox->searchMailbox('ALL');
        } catch(ConnectionException $ex) {
            echo "IMAP connection failed: " . $ex;
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

        return view('read-email', ["id"=>$id], ['mailbox'=>$mailbox]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
