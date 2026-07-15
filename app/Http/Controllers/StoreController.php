<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

class StoreController extends Controller
{
    public function home()
    {
        $products = Product::with('category')->latest()->take(8)->get();

        $categories = Category::where('status',1)->get();

        return view('store.home', compact(
            'products',
            'categories'
        ));
    }


    public function products($category = null)
    {
        $search = request('search');

        $products = Product::with('category')
            ->when($search, function($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->when($category, function($query) use ($category) {
                $query->where('category_id', $category);
            })
            ->latest()
            ->get();

        $categoryData = $category ? Category::find($category) : null;

        return view('store.products.index', compact('products','categoryData'));
    }

    public function show(Product $product)
    {
        return view('store.products.show', compact('product'));
    }
}
