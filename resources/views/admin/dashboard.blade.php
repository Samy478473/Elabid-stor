@extends('admin.layouts.app')


@section('content')


<div class="grid grid-cols-1 md:grid-cols-4 gap-6">



<div class="bg-white rounded-2xl shadow p-6">

<h3 class="text-gray-500">
المنتجات
</h3>

<p class="text-4xl font-bold mt-3">
{{ $products }}
</p>

📦

</div>




<div class="bg-white rounded-2xl shadow p-6">

<h3 class="text-gray-500">
الأقسام
</h3>

<p class="text-4xl font-bold mt-3">
{{ $categories }}
</p>

📂

</div>




<div class="bg-white rounded-2xl shadow p-6">

<h3 class="text-gray-500">
الطلبات
</h3>

<p class="text-4xl font-bold mt-3">
0
</p>

🛒

</div>




<div class="bg-white rounded-2xl shadow p-6">

<h3 class="text-gray-500">
العملاء
</h3>

<p class="text-4xl font-bold mt-3">
0
</p>

👥

</div>




</div>



@endsection
