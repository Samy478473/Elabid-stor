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



    public function products()
    {
        $products = Product::with('category')->latest()->get();

        return view('store.products.index', compact('products'));
    }



    public function show(Product $product)
    {
        return view('store.products.show', compact('product'));
    }

}
