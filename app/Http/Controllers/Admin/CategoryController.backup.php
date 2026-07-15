<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::latest()->get();

        return view('admin.categories.index', compact('categories'));
    }


    public function create()
    {
        return view('admin.categories.create');
    }


    public function store(Request $request)
    {
        Category::create([
            'name'=>$request->name,
            'slug'=>str()->slug($request->name),
            'description'=>$request->description,
            'status'=>1
        ]);

        return redirect()->route('categories.index');
    }


    public function edit(Category $category)
    {
        return view('admin.categories.edit',compact('category'));
    }


    public function update(Request $request, Category $category)
    {
        $category->update([
            'name'=>$request->name,
            'slug'=>str()->slug($request->name),
            'description'=>$request->description
        ]);

        return redirect()->route('categories.index');
    }


    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index');
    }

}
