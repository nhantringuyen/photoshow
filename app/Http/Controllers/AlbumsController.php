<?php
//php artisan make:controller AlbumsController
//php artisan storage:link
namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumsController extends Controller
{
    public function index(){
        $albums = Album::with('Photos')->get();
        return view('albums.index')->with('albums',$albums);
    }
    public function create(){
        return view('albums.create');
    }
    public function store(Request $request){
        $this->validate($request,[
           'name' => 'required',
           'cover_image' => 'image|max:1999'
        ]);
//        dd($request->request->file('cover_image'));
        //Get filename with extension
//        $data = $request->input('cover_image');

        $filenameWithExt = $request->file('cover_image')->getClientOriginalName();

        //Get just the filename
        $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);

        //Get extension
        $extension = $request->file('cover_image')->getClientOriginalExtension();

        //Create new filename
        $filenameToStore = $filename .'_'. time() .'.'. $extension;

        //Upload image
        $path = $request->file('cover_image')->storeAs('public/album_covers', $filenameToStore);

        //Create Album
        $album = new Album;
        $album->name = $request->input('name');
        $album->description = $request->input('description');
        $album->cover_image = $filenameToStore;

        $album->save();

        return redirect('/albums')->with('success','Album Created');
    }

    public function show($id){
        $album = Album::with('Photos')->find($id);
        return view('albums.show')->with('album',$album);
    }
}
