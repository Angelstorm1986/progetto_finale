<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Developer;
use App\User;
use App\Language;
use App\Message;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $find = Auth::id();

        $call = "SELECT messages.name, messages.content, messages.mail, messages.created_at FROM messages LEFT JOIN developers ON developer_id = developers.id LEFT JOIN users ON users.id = developers.user_id WHERE users.id = {$find}";
        
        $messages = DB::select($call);
        
        return view('admin.messages.index',  compact('messages'));
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
        $data = $request->all();
        if($data['content'] != ''){
        $newMessage = new Message();
        $newMessage->name = $data['name'];
        $newMessage->content = $data['content'];
        $newMessage->mail = $data['mail'];
        $newMessage->developer_id = $data['developer_id'];

         return $newMessage->save();
        } else{
            $comtrol = true;
            return compact('comtrol');
        }

        //Mail::to('matteo.nichelini@gmail.com')->send(new SendNewMail($newComment->post));
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
