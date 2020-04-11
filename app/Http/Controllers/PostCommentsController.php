<?php

namespace App\Http\Controllers;

use App\Comment;
use App\CommentReply;
use App\Post;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PostCommentsController extends Controller
{
    public function index()
    {
        $comments = Comment::all();
        return view('admin.comments.index', compact('comments'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $data = [
            'post_id' => $request->post_id,
            'author' => $user->name,
            'email' => $user->email,
            'photo' => $user->photo->file,
            'body' => $request->body
        ];

//        dd($data);
        Comment::create($data);
        $request->session()->flash('comment_message', 'Your message has been submitted and is waiting moderation 🙂');
        return redirect()->back();
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        $comments = $post->comments;
        return view('admin.comments.show', compact('comments'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        Comment::findOrFail($id)->update($request->all());
        return redirect('admin/comments');
    }

    public function destroy($id)
    {
        $comment_replies = CommentReply::where(['comment_id' => $id])->get();
        foreach ($comment_replies as $comment_reply) {
            $comment_reply->delete();
        }

        Comment::findOrFail($id)->delete();
        Session::flash('deleted_comment', 'The comment has been deleted!');
        return redirect()->back();
    }
}
