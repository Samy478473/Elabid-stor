<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);

        return view('store.cart', compact('cart'));
    }

    public function add(Request $request, Product $product)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $request->input('quantity',1);
        } else {
            $cart[$product->id] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $request->input('quantity',1),
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index')
            ->with('success', 'تمت إضافة المنتج إلى السلة');
    }

    public function update(Request $request, $id)
    {
        $cart = session()->get("cart", []);
        if(isset($cart[$id])) {
            $cart[$id]["quantity"] = $request->quantity;
        }
        session()->put("cart", $cart);
        return redirect()->route("cart.index");
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index')
            ->with('success', 'تم حذف المنتج من السلة');
    }
}
