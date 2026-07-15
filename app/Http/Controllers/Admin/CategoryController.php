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
        $request->validate([
            'name' => 'required|unique:categories,name',
            'description' => 'nullable',
            'image' => 'nullable|image|max:2048',
        ]);

        $image = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('categories', 'public');
        }

        Category::create([
            'name' => $request->name,
            'slug' => str()->slug($request->name),
            'description' => $request->description,
            'image' => $image,
            'status' => 1
        ]);

        return redirect()
            ->route('categories.index')
            ->with('success','تم إضافة القسم بنجاح');
    }


    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }


    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,' . $category->id,
            'description' => 'nullable',
            'image' => 'nullable|image|max:2048',
        ]);

        $image = $category->image;

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('categories', 'public');
        }

        $category->update([
            'name' => $request->name,
            'slug' => str()->slug($request->name),
            'description' => $request->description,
            'image' => $image
        ]);

        return redirect()
            ->route('categories.index');
    }


    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()
            ->route('categories.index');
    }
}
