@extends('admin.layouts.app')

@section('content')

<div class="p-6">

<h1 class="text-3xl font-bold mb-6">
➕ إضافة قسم
</h1>

<div class="bg-white rounded-xl shadow p-6">

<form method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data">

@csrf

<div class="mb-4">
<label class="block mb-2">
اسم القسم
</label>

<input type="text"
name="name"
class="w-full border p-3 rounded"
placeholder="مثال: خراطيم">
</div>


<div class="mb-4">
<label class="block mb-2">
الوصف
</label>

<textarea
name="description"
class="w-full border p-3 rounded"
placeholder="وصف القسم"></textarea>

</div>


<div class="mb-4">
<label class="block mb-2">
صورة القسم
</label>

<input type="file"
name="image"
class="w-full border p-3 rounded">
</div>


<button
class="bg-green-600 text-white px-5 py-3 rounded">
حفظ القسم
</button>


</form>

</div>

</div>

@endsection
