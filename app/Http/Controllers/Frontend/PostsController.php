<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function post($slug) {

        $posts = Post::orderBy('created_at', 'desc')->take(3)->get();
        $post = Post::where('slug',$slug)->first();
        $comments = $post->comments()->whereIsActive(1)->get();
        $categories = Category::with('posts')->get();
        return view('post', compact('post', 'comments', 'categories', 'posts'));
    }


    public function postsByCategories($slug) {
        $categories = Category::all();
        $category = Category::where('slug',$slug)->first();
        $postsByCategories = Post::where('category_id', $category->id)->get();
        return view('posts-by-categories', compact('postsByCategories', 'category', 'categories'));
    }
}
