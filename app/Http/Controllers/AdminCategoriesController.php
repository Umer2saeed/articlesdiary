<?php

namespace App\Http\Controllers;

use App\Category;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminCategoriesController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }


    public function store(Request $request)
    {

        $category_slug = createSlug($request->name, '\App\Category', 'name');
        $category_data = [
            'name' => $request->name,
            'photo_id' => $request->photo_id,
            'slug' => $category_slug,
        ];

        if($file = $request->file('photo_id')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file' => $name]);
            $category_data['photo_id'] = $photo->id;
        }

        Category::create($category_data);
        return redirect('/admin/categories');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }


    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category_slug = createSlug($request->name, '\App\Category', 'name');
        $category_data = [
            'name' => $request->name,
            'photo_id' => $request->photo_id,
            'slug' => $category_slug,
        ];

        if($file = $request->file('photo_id')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::updateOrCreate(['id' => $category->photo_id],['file' => $name]);
            $category_data['photo_id'] = $photo->id;
        }

        $category->update($category_data);
        return redirect('admin/categories');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        if ($category->photo){
            unlink(public_path() . $category->photo->file);
            Photo::where('id', $category->photo_id)->first()->delete();
        }
        $category->delete();
        Session::flash('deleted_category', 'The category has been deleted!');
        return redirect('admin/categories');
    }
}
