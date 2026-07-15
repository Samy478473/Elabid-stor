@extends('admin.layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-8">
    لوحة تحكم الأبيض
</h1>


<div class="grid grid-cols-1 md:grid-cols-5 gap-6">


    <div class="bg-white rounded-2xl shadow p-6 text-center">
        <div class="text-5xl mb-3">📦</div>
        <h2 class="text-xl font-bold">المنتجات</h2>
        <p class="text-3xl mt-3">{{ $products }}</p>
    </div>


    <div class="bg-white rounded-2xl shadow p-6 text-center">
        <div class="text-5xl mb-3">📂</div>
        <h2 class="text-xl font-bold">الأقسام</h2>
        <p class="text-3xl mt-3">{{ $categories }}</p>
    </div>


    <div class="bg-white rounded-2xl shadow p-6 text-center">
        <div class="text-5xl mb-3">🛒</div>
        <h2 class="text-xl font-bold">الطلبات</h2>
        <p class="text-3xl mt-3">{{ $orders }}</p>
    </div>


    <div class="bg-white rounded-2xl shadow p-6 text-center">
        <div class="text-5xl mb-3">👥</div>
        <h2 class="text-xl font-bold">العملاء</h2>
        <p class="text-3xl mt-3">{{ $customers }}</p>
    </div>


    <div class="bg-white rounded-2xl shadow p-6 text-center">
        <div class="text-5xl mb-3">💰</div>
        <h2 class="text-xl font-bold">المبيعات</h2>
        <p class="text-3xl mt-3">{{ $sales }} ج</p>
    </div>


</div>


@endsection
