<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// custom
use Illuminate\Support\Facades\Mail;
use App\Mail\sendingEmail;

class EmailSenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('email');
    }

    public function send(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'title' => 'required',
            'message' => 'required',
            'reasoning' => 'required'
        ]);

        $receiver = $request->email;

        $data = array(
            'name' => $request->name,
            'title' => $request->title,
            'message' => $request->message,
            'reasoning' => $request->reasoning
        );

        \Illuminate\Support\Facades\Mail::to($receiver)
            ->send(new \App\Mail\sendingEmail($data)); //sendingEmail is a different app model
        return back()->with('success', 'Thanks for contacting me!');
    }

    public function reply(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'title' => 'required',
            'message' => 'required',
        ]);

        $receiver = $request->email;

        $data = array(
            'name' => $request->name,
            'title' => $request->title,
            'message' => $request->message,
        );

        \Illuminate\Support\Facades\Mail::to($receiver)
            ->send(new \App\Mail\sendingEmail($data)); //sendingEmail is a different app model
        return back()->with('success', 'Thanks for contacting me!');
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
        //
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
