<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')
            ->latest()
            ->get();

        return view('products.index', compact('products'));
    }


    public function create()
    {
        $categories = Category::where('status', true)->get();

        return view('products.create', compact('categories'));
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:200',
            'description' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);


        $data['slug'] = Str::slug($data['name']);

        $data['sku'] = 'SKU-' . strtoupper(Str::random(8));


        Product::create($data);


        return redirect()
            ->route('products.index')
            ->with('success','Product created successfully');
    }


    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }


    public function edit(Product $product)
    {
        $categories = Category::all();

        return view('products.edit', compact(
            'product',
            'categories'
        ));
    }


    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:200',
            'description' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);


        $data['slug'] = Str::slug($data['name']);


        $product->update($data);


        return redirect()
            ->route('products.index')
            ->with('success','Product updated');
    }


    public function destroy(Product $product)
    {
        $product->delete();


        return redirect()
            ->route('products.index')
            ->with('success','Product deleted');
    }
}
