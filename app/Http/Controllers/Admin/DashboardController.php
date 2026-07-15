<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index()
    {
        $products = Product::count();

        $categories = Category::count();

        $customers = User::count();

        $orders = Order::count();

        $sales = Order::where('status','delivered')
            ->sum('total_amount');


        return view('admin.dashboard.index', compact(
            'products',
            'categories',
            'customers',
            'orders',
            'sales'
        ));
    }
}
