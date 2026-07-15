<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function create()
    {
        $categories = Category::all();

        return view('admin.products.create', compact('categories'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'nullable|image',
        ]);


        $image = null;

        if ($request->hasFile('image')) {

            $image = $request->file('image')
                ->store('products', 'public');

        }


        Product::create([

            'category_id' => $request->category_id,

            'name' => $request->name,

            'slug' => Str::slug($request->name),

            'description' => $request->description,

            'sku' => 'SKU-' . time(),

            'price' => $request->price,

            'sale_price' => $request->sale_price,

            'stock' => $request->stock,

            'featured_image' => $image,

            'weight' => $request->weight ?? 0,

            'featured' => $request->featured ? 1 : 0,

            'status' => 1,

        ]);


        return redirect()
            ->back()
            ->with('success','تم إضافة المنتج بنجاح');
    }
}
