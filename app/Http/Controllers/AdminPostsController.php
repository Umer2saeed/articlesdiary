<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Photo;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminPostsController extends Controller
{

    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }


    public function create()
    {
        $categories = Category::pluck('name', 'id')->all();
        return view('admin.posts.create', compact('categories'));
    }


    public function store(Request $request)
    {
        $user = Auth::user();
        $post_slug = createSlug($request->title, '\App\Post', 'title');
        $post_data = [
            'user_id' => $user->id,
            'category_id' => $request->category_id,
            'photo_id' => $request->photo_id,
            'title' => $request->title,
            'slug' => $post_slug,
            'body' => $request->body
        ];

        if($file = $request->file('photo_id')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file' => $name]);
            $post_data['photo_id'] = $photo->id;
        }

        $user->posts()->create($post_data);
        return redirect('/admin/posts');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::pluck('name', 'id')->all();
        return view('admin.posts.edit', compact('post', 'categories'));
    }


    public function update(Request $request, $id)
    {
        $post = Post::findOrfail($id);
        $post_slug = createSlug($request->title, '\App\Post', 'title');
//        $input = $request->all();

        $post_data = [
            'category_id' => $request->category_id,
            'title' => $request->title,
            'slug' => $post_slug,
            'body' => $request->body
        ];

        if($file = $request->file('photo_id')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::updateOrCreate(['id' => $post->photo_id],['file' => $name]);
            $post_data['photo_id'] = $photo->id;
        }

        Auth::user()->posts()->whereId($id)->first()->update($post_data);
        return redirect('/admin/posts');
    }


    public function destroy($id)
    {
        $comments = Comment::all()->where('post_id', $id);
        foreach ($comments as $comment) {
            unlink(public_path() . $comment->photo);
            $comment->delete();
        }

        $post = Post::findOrFail($id);
        if ($post->photo){
            unlink(public_path() . $post->photo->file);
            Photo::where('id', $post->photo_id)->first()->delete();
        }

        $post->delete();
        Session::flash('deleted_post', 'The post has been deleted!');
        return redirect('/admin/posts');
    }


}
