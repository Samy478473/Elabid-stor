@extends('admin.layouts.app')

@section('content')

<div class="p-6">

<div class="flex justify-between items-center mb-6">

<h1 class="text-3xl font-bold">
📂 الأقسام
</h1>

<a href="{{ route('categories.create') }}"
class="bg-green-600 text-white px-5 py-2 rounded">
➕ إضافة قسم
</a>

</div>


<div class="bg-white rounded-xl shadow overflow-hidden">

<table class="w-full">

<thead class="bg-gray-100">

<tr>
<th class="p-3">الاسم</th>
<th class="p-3">الوصف</th>
<th class="p-3">التحكم</th>
</tr>

</thead>


<tbody>

@foreach($categories as $category)

<tr class="border-t">

<td class="p-3">
{{ $category->name }}
</td>

<td class="p-3">
{{ $category->description }}
</td>

<td class="p-3">

<a href="{{ route('categories.edit',$category) }}"
class="bg-blue-600 text-white px-3 py-1 rounded">
تعديل
</a>


<form action="{{ route('categories.destroy',$category) }}"
method="POST"
class="inline">

@csrf
@method('DELETE')

<button class="bg-red-600 text-white px-3 py-1 rounded"
onclick="return confirm('حذف القسم؟')">
حذف
</button>

</form>

</td>

</tr>

@endforeach

</tbody>

</table>

</div>

</div>

@endsection
