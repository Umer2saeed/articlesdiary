<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('categories', compact('categories'));
    }

//    public function postsByCategories() {
//        return view('posts-by-categories');
//    }
}
