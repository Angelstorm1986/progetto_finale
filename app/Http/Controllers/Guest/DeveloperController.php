<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Developer;
use App\User;
use App\Language;
use App\Message;
use DB;


class DeveloperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $developers = Developer::all();
        $languages = Language::all();
        
        
        return view('guest.developers.index', compact('developers', 'users', 'languages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Developer $developer)
    {
        $user = User::findOrFail($developer->user_id);

        
        
        return view('guest.developers.show', compact('developer', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */




    private function getSlug($title)
    {
        $slug = Str::of($title)->slug("-");
        $count = 1;
        while( Developer::where("slug", $slug)->first() ) {
            $slug = Str::of($title)->slug("-") . "-{$count}";
            $count++;
        }

        return $slug;
    }

    public function storeMessage(Request $request)
    {
        $data = $request->all();
        $newMessage = new Message();
        $newMessage->name = $data['name'];
        $newMessage->content = $data['content'];
        $newMessage->mail = $data['mail'];
        $newMessage->developer_id = $data['developer_id'];

        $newMessage->save();

        //Mail::to('matteo.nichelini@gmail.com')->send(new SendNewMail($newComment->post));

        return response()->json($newMessage);
    }
}
