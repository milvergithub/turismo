<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageContactRequest;
use App\MessageContact;
use Illuminate\Http\Request;

class MessageContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(MessageContactRequest $request)
    {
        $message = new MessageContact($request->all());
        $message->save();
        return redirect()->route('contact')->with('message', 'Mensaje enviado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MessageContact  $messageContact
     * @return \Illuminate\Http\Response
     */
    public function show(MessageContact $messageContact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MessageContact  $messageContact
     * @return \Illuminate\Http\Response
     */
    public function edit(MessageContact $messageContact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MessageContact  $messageContact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MessageContact $messageContact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MessageContact  $messageContact
     * @return \Illuminate\Http\Response
     */
    public function destroy(MessageContact $messageContact)
    {
        //
    }
}
