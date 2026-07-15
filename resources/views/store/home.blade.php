@extends('layouts.app')

@section('content')

<div class="space-y-10">

<!-- البحث -->
<div>
<form action="{{ route('store.products') }}" method="GET">

<input
type="text"
name="search"
placeholder="ابحث عن منتج..."
class="w-full p-4 rounded-2xl shadow bg-white border">

</form>
</div>


<!-- البانر -->
<div class="bg-blue-700 text-white rounded-3xl p-10 shadow">
    <h1 class="text-4xl font-bold">
        الأبيض 🛒
    </h1>

    <p class="mt-4 text-xl">
        كل احتياجاتك في مكان واحد بجودة وثقة
    </p>

    <a href="{{ route('store.products') }}"
       class="inline-block mt-6 bg-white text-blue-700 px-6 py-3 rounded-xl font-bold">
        تسوق الآن
    </a>
</div>


<!-- الأقسام -->
<section>

<h2 class="text-3xl font-bold mb-6">
الأقسام
</h2>

<div class="grid grid-cols-2 md:grid-cols-5 gap-5">

@foreach($categories as $category)

<a href="{{ route('store.products', $category->id) }}"
class="bg-white rounded-3xl shadow p-6 text-center hover:shadow-xl">

<div class="text-5xl mb-3">
@if($category->image)
<img src="{{ asset('storage/'.$category->image) }}" class="w-20 h-20 mx-auto object-cover rounded-full">
@else
📦
@endif
</div>
<h3 class="font-bold">
{{ $category->name }}
</h3>

</a>

@endforeach

</div>

</section>



<!-- المنتجات -->

<section>

<h2 class="text-3xl font-bold mb-6">
أحدث المنتجات
</h2>


<div class="grid grid-cols-2 md:grid-cols-4 gap-6">


@foreach($products as $product)

<div class="bg-white rounded-3xl shadow overflow-hidden">


<div class="h-52 bg-gray-100">

@if($product->featured_image)

<img src="{{ asset('storage/'.$product->featured_image) }}"
class="w-full h-full object-cover">

@elseif($product->image_url)

<img src="{{ $product->image_url }}"
class="w-full h-full object-cover">

@else

<div class="flex items-center justify-center h-full text-5xl">
📷
</div>

@endif

</div>



<div class="p-5">

<h3 class="font-bold text-lg">
{{ $product->name }}
</h3>


<p class="text-green-600 font-bold mt-3">
{{ $product->price }} جنيه
</p>


<a href="{{ route('products.show',$product) }}"
class="block text-center bg-blue-600 text-white rounded-xl py-2 mt-4">

عرض المنتج

</a>


</div>


</div>


@endforeach


</div>

</section>


</div>

@endsection
