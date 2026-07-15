@extends('admin.layouts.app')

@section('content')

<div class="p-6">

<h1 class="text-3xl font-bold mb-6">
✏️ تعديل القسم
</h1>

<div class="bg-white rounded-xl shadow p-6">

<form method="POST" action="{{ route('categories.update',$category) }}" enctype="multipart/form-data">

@csrf
@method('PUT')


<div class="mb-4">

<label class="block mb-2">
اسم القسم
</label>

<input type="text"
name="name"
value="{{ $category->name }}"
class="w-full border p-3 rounded">

</div>


<div class="mb-4">

<label class="block mb-2">
الوصف
</label>

<textarea
name="description"
class="w-full border p-3 rounded">{{ $category->description }}</textarea>

</div>


<div class="mb-4">

<label class="block mb-2">
الصورة الحالية
</label>

@if($category->image)

<img src="{{ asset('storage/'.$category->image) }}"
class="w-32 h-32 object-cover rounded mb-3">

@endif


<label class="block mb-2">
تغيير الصورة
</label>

<input type="file"
name="image"
class="w-full border p-3 rounded">

</div>


<button class="bg-blue-600 text-white px-5 py-3 rounded">
حفظ التعديل
</button>


</form>

</div>

</div>

@endsection
