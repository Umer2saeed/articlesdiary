<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AdminMediasController extends Controller
{
    public function index() {
        $photos = Photo::all();
        return view('admin.media.index', compact('photos'));
    }

    public function create() {
        return view('admin.media.create');
    }

    public function store(Request $request) {
        $file = $request->file('file');
        $name = time() . $file->getClientOriginalName();
        $file->move('images', $name);
        Photo::create(['file'=>$name]);
    }

//    This destroy function is not working properly so that is why I disabled it for now.
    public function destroy($id){
        $photo = Photo::findOrFail($id);
//        dd($photo->id);
        if (!file_exists($photo)){
            unlink(public_path() . $photo->file);
        }
        $photo->delete();
        Session::flash('deleted_media', 'The picture has been deleted!');

    }

    public function deleteMedia(Request $request) {

//        This function is not working properly. So that is why I disabled it.
//        if (isset($request->delete_single)) {
//           $this->destroy($request->photo_id);
//           return redirect()->back();
//        }

        if (isset($request->delete_all_media) && !empty($request->checkBoxArray)) {
            $photos = Photo::findOrFail($request->checkBoxArray);

            foreach ($photos as $photo) {
                if ($photo){
                    unlink(public_path() . $photo->file);
                    Session::flash('deleted_photo', 'Photo has been deleted.');
                    $photo->delete();
                }
            }
            return redirect()->back();
        } else {
            return redirect()->back();
        }

    }

}
