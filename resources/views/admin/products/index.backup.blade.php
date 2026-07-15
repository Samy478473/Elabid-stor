@extends('admin.layouts.app')

@section('content')

<div class="p-6">

    <div class="flex justify-between items-center mb-6">

        <h1 class="text-3xl font-bold">📦 المنتجات</h1>

        <a href="{{ route('products.create') }}"
           class="bg-green-600 hover:bg-green-700 text-white px-5 py-3 rounded-xl">
            ➕ إضافة منتج
        </a>

    </div>

    <div class="bg-white rounded-xl shadow overflow-hidden">

        <table class="w-full">

            <thead class="bg-gray-100">

                <tr>

                    <th class="p-4">الصورة</th>
                    <th class="p-4 text-right">المنتج</th>
                    <th class="p-4 text-right">السعر</th>
                    <th class="p-4 text-right">المخزون</th>
                    <th class="p-4 text-right">الحالة</th>
                    <th class="p-4 text-center">التحكم</th>

                </tr>

            </thead>

            <tbody>

            @foreach($products as $product)

                <tr class="border-t">

                    <td class="p-3">

                        @if($product->featured_image)

                            <img src="{{ asset('storage/'.$product->featured_image) }}"
                                 class="w-16 h-16 rounded object-cover">

                        @else

                            📷

                        @endif

                    </td>

                    <td class="p-3">{{ $product->name }}</td>

                    <td class="p-3">{{ $product->price }} ج</td>

                    <td class="p-3">{{ $product->stock }}</td>

                    <td class="p-3">
                        @if($product->status)
                            ✅
                        @else
                            ❌
                        @endif
                    </td>

                    <td class="p-3 text-center">

                        <a href="{{ route('admin.products.edit',$product) }}"
                           class="bg-blue-600 text-white px-3 py-2 rounded">
                            تعديل
                        </a>

                        <form action="{{ route('admin.products.destroy',$product) }}"
                              method="POST"
                              class="inline">

                            @csrf
                            @method('DELETE')

                            <button
                                onclick="return confirm('حذف المنتج؟')"
                                class="bg-red-600 text-white px-3 py-2 rounded">

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