<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;

class AdminController extends Controller
{
    public function index(){

        //echo"This is index method";
       // exit;
        return view('admin.dashboard');
    }


public function list_albums()
{
    $albums = Album::all();
    return view('admin.albums', compact('albums'));
}

public function edit_album($id)
    {
        $album = Album::find($id);
        return view('admin.edit_album', compact('album'));
    }

public function save_album(Request $request)
    {
        // dump($request->id);
        // dump($request->description);

        $album = Album::find($request->id);  // SELECT * FROM album WHRE id = $request->id
        //dump($album );
        $album->title = $request->title;
        $album->description = $request->description;

        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            $path = $file->store('public');
            $album->cover_image = $path;
        }
        $album->save();

        return redirect()->route('admin.albums')->with('success', 'Album Updated Successfully');

    }

    public function delete_album($id){
        $album = Album::find($id);
        $album->delete();
        return redirect()->route('admin.albums')
        ->with('success', 'Album deleted successfully');

    }

    public function create_album(){
        return view('admin.create_album');
    }
}