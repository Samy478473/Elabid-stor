<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function checkout()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')
                ->with('error', 'السلة فارغة');
        }

        return view('store.checkout', compact('cart'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name'    => 'required|string|max:255',
            'customer_phone'   => 'required|string|max:30',
            'customer_address' => 'required|string|max:1000',
        ]);

        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index');
        }

        DB::beginTransaction();

        try {

            $subtotal = 0;

            foreach ($cart as $item) {
                $subtotal += $item['price'] * $item['quantity'];
            }

            $order = Order::create([
                'user_id'            => Auth::id(),
                'order_number'       => 'ORD-' . time(),
                'customer_name'      => $request->customer_name,
                'customer_phone'     => $request->customer_phone,
                'customer_address'   => $request->customer_address,
                'subtotal'           => $subtotal,
                'shipping_cost'      => 0,
                'discount_amount'    => 0,
                'total_amount'       => $subtotal,
                'status'             => 'pending',
                'payment_method'     => 'cash',
                'payment_status'     => 'unpaid',
            ]);

            foreach ($cart as $productId => $item) {

                OrderItem::create([
                    'order_id'   => $order->id,
                    'product_id' => $productId,
                    'price'      => $item['price'],
                    'quantity'   => $item['quantity'],
                    'total'      => $item['price'] * $item['quantity'],
                ]);
            }

            DB::commit();

            session()->forget('cart');

            return redirect()->route('order.success');

        } catch (\Exception $e) {

            DB::rollBack();

            return back()->with('error', $e->getMessage());
        }
    }

    public function success()
    {
        return view('store.success');
    }
}
