@extends('admin.layouts.app')

@section('content')

<div class="p-6">

<h1 class="text-3xl font-bold mb-6">
✏️ تعديل المنتج
</h1>

<div class="bg-white rounded-xl shadow p-6">

<form action="{{ route('admin.products.update',$product) }}" method="POST" enctype="multipart/form-data" enctype="multipart/form-data">

@csrf
@method('PUT')


<label class="block mb-2">
القسم
</label>

<select name="category_id" class="w-full border rounded-xl p-3 mb-4">

@foreach($categories as $category)

<option value="{{ $category->id }}"
{{ $product->category_id == $category->id ? 'selected' : '' }}>

{{ $category->name }}

</option>

@endforeach

</select>


<label class="block mb-2">
اسم المنتج
</label>

<input
type="text"
name="name"
value="{{ $product->name }}"
class="w-full border rounded-xl p-3 mb-4">


<label class="block mb-2">
الوصف
</label>

<textarea
name="description"
class="w-full border rounded-xl p-3 mb-4">{{ $product->description }}</textarea>


<label class="block mb-2">
السعر
</label>

<input
type="number"
name="price"
value="{{ $product->price }}"
class="w-full border rounded-xl p-3 mb-4">


<label class="block mb-2">
سعر الخصم
</label>

<input
type="number"
name="sale_price"
value="{{ $product->sale_price }}"
class="w-full border rounded-xl p-3 mb-4">


<label class="block mb-2">
المخزون
</label>

<input
type="number"
name="stock"
value="{{ $product->stock }}"
class="w-full border rounded-xl p-3 mb-4">


<label class="block mb-2">
صورة المنتج
</label>

<input
type="file"
name="image"
class="w-full border rounded-xl p-3 mb-4">


<label>

<input
type="checkbox"
name="featured"
{{ $product->featured ? 'checked' : '' }}>

منتج مميز

</label>


<br><br>


<button
class="bg-blue-600 text-white px-6 py-3 rounded-xl">

حفظ التعديلات

</button>


</form>

</div>

</div>

@endsection
