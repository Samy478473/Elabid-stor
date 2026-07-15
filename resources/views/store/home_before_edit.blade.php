@extends('layouts.app')

@section('content')

<div class="space-y-8">

<!-- البحث -->
<div>
<input
type="text"
placeholder="ابحث عن منتج..."
class="w-full p-4 rounded-2xl shadow bg-white border focus:outline-none"
>
</div>


<!-- البانر -->
<div class="bg-yellow-400 rounded-3xl p-8 shadow">

<h1 class="text-3xl md:text-4xl font-bold">
الأبيض 🛒
</h1>

<p class="mt-3 text-lg">
كل احتياجاتك في مكان واحد
</p>

</div>



<!-- الأقسام -->

<section>

<h2 class="text-2xl font-bold mb-5">
الأقسام
</h2>


<div class="grid grid-cols-2 md:grid-cols-5 gap-4">

@foreach($categories as $category)

<a href="{{ route('store.products') }}" class="block"><div class="bg-white rounded-2xl shadow p-5 text-center hover:shadow-lg transition">

<div class="text-4xl mb-3">
📦
</div>

<h3 class="font-bold">
{{ $category->name }}
</h3>

</div>

@endforeach

</div>

</section>




<!-- المنتجات -->

<section>

<h2 class="text-2xl font-bold mb-5">
أحدث المنتجات
</h2>


<div class="grid grid-cols-2 md:grid-cols-4 gap-5">


@foreach($products as $product)


<div class="bg-white rounded-2xl shadow overflow-hidden">


<div class="h-44 bg-gray-100">

@if($product->featured_image)

<img
src="{{ asset('storage/'.$product->featured_image) }}"
class="w-full h-full object-cover"
>

@elseif($product->image_url)

<img
src="{{ $product->image_url }}"
class="w-full h-full object-cover"
>

@else

<div class="h-full flex items-center justify-center text-5xl">
📷
</div>

@endif

</div>



<div class="p-4">


<h3 class="font-bold text-lg">
{{ $product->name }}
</h3>


<p class="text-green-600 font-bold mt-2">
{{ $product->price }} جنيه
</p>



<div class="flex gap-2 mt-4">

<a
href="{{ route('products.show',$product) }}"
class="flex-1 bg-blue-600 text-white text-center py-2 rounded-xl text-sm">

عرض

</a>


<a
href="{{ route('cart.add',$product) }}"
class="bg-green-600 text-white px-4 py-2 rounded-xl">

+

</a>


</div>


</div>


</div>


@endforeach


</div>

</section>


</div>


@endsection
