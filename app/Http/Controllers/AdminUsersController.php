<?php

namespace App\Http\Controllers;

use App\Country;
use App\Http\Requests\UsersEditRequest;
use App\Photo;
use App\Post;
use App\Role;
use App\User;
use Couchbase\UserSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminUsersController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }


    public function create()
    {
        $roles = Role::pluck('name', 'id')->all();
        $countries = Country::pluck('name', 'id')->all();
        return view('admin.users.create', compact('roles', 'countries'));
    }

    public function store(Request $request)
    {

        $input = $request->all();

        if($file = $request->file('photo_id')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file' => $name]);
            $input['photo_id'] = $photo->id;
        }

        $input['password'] = bcrypt($request->password);
        User::create($input);

        return redirect('/admin/users');

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::pluck('name', 'id')->all();
        $countries = Country::pluck('name', 'id')->all();
        return view('admin.users.edit', compact('user', 'roles', 'countries'));

    }

    public function update(Request $request, $id)
    {
        $user = User::findOrfail($id);
        $input = $request->all();
        if ($file = $request->file('photo_id')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::updateOrCreate(['id' => $user->photo_id],['file' => $name]);
            $input['photo_id'] = $photo->id;
        }
        $user->update($input);

        return redirect('/admin/users');
    }

    public function destroy($id)
    {
        $posts = Post::all()->where('user_id', $id);
        foreach ($posts as $post) {
            unlink(public_path() . $post->photo->file);
            $post->delete();
        }

        $user = User::findOrFail($id);
        if ($user->photo){
            unlink(public_path() . $user->photo->file);
            Photo::where('id', $user->photo_id)->first()->delete();
        }

        $user->delete();
        Session::flash('deleted_user', 'The user has been deleted!');
        return redirect('/admin/users');
    }
}
