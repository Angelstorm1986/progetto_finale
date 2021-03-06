<?php

namespace App\Http\Controllers\Admin;

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
        
        return view('admin.developers.index', compact('developers', 'users', 'languages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $languages = Language::all();
        return view('admin.developers.create', compact('users', 'languages'));
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
        $user = Auth::user()->name;

        $newDeveloper = new Developer();

        $newDeveloper->skills = $data['skills'];
        $newDeveloper->phone_number = $data['phone_number'];
        $newDeveloper->description = $data['description'];
        $newDeveloper->slug = $this->getSlug($user);
        $newDeveloper->user_id = Auth::id();

        if( isset($data['photo']) ) {
            $path_photo = Storage::put("public/uploads", $data['photo']);
            $newDeveloper->photo = $path_photo;
        }

        if( isset($data['curriculum']) ) {
            $path_curriculum = Storage::put("public/uploads", $data['curriculum']);
            $newDeveloper->curriculum = $path_curriculum;
        }


        $newDeveloper->save();
        $newDeveloper->languages()->sync($data['languages']);

        return Redirect()->route('admin.developers.show', $newDeveloper->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($number)
    {
        $developer = Developer::findOrFail($number);
        $user = User::findOrFail($developer->user_id);

        
        
        return view('admin.developers.show', compact('developer', 'user'));
    }

    public function dashboard(Developer $developer)
    {
        $user = Auth::user();
        
        return view('admin.developers.show', compact('developer', 'user'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Developer $developer)
    {
        $checked = DB::table('developer_language')->where('developer_id', $developer->id)->get('language_id');
        $languages = Language::all();
        // foreach($languages as $lingua){
        //     array_push($checked, DB::table('developer_language')->where('developer_id', $developer->id)->get('language_id'));
        // }
        return view('admin.developers.edit',compact('developer', 'languages', 'checked'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Developer $developer)
    {
        $data = $request->all();

       
        $developer->skills = $data['skills'];
        $developer->phone_number = $data['phone_number'];
        $developer->description = $data['description'];

        if( isset($data['curriculum']) ) {
            // cancello l'immagine
            Storage::delete($developer->curriculum);
            // salvo la nuova immagine
            $path_curriculum = Storage::put("uploads", $data['curriculum']);
            $developer->curriculum = $path_curriculum;
        }

        if( isset($data['photo']) ) {
            // cancello l'immagine
            Storage::delete($developer->photo);
            // salvo la nuova immagine
            $path_image = Storage::put("uploads", $data['photo']);
            $developer->photo = $path_image;
        }

        $developer->languages()->sync($data['languages']);

        $developer->update();

        return redirect()->route('admin.developers.show', $developer->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $developer = Developer::findOrFail($id);
        $developer->delete();
        return redirect()->route('admin.developers.index')->with("message","Developer with id: {$developer->id} successfully deleted !");
        
    }




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
