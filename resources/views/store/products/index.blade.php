<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>المنتجات - الأبيض</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<header class="bg-white shadow p-5 flex justify-between items-center">

    <h1 class="text-3xl font-bold">
        🛒 الأبيض
    </h1>

    <div class="space-x-4">

        <a href="{{ route('store.home') }}" class="text-blue-600">
            الرئيسية
        </a>

        <a href="{{ route('cart.index') }}" class="text-green-600">
            السلة ({{ count(session('cart', [])) }})
        </a>

    </div>

</header>

<div class="max-w-7xl mx-auto p-6">

    <h2 class="text-3xl font-bold mb-6">
        {{ $categoryData ? $categoryData->name : 'جميع المنتجات' }}
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

        @foreach($products as $product)

            <div class="bg-white rounded-xl shadow p-5">
@if($product->featured_image)
<img src="{{ asset("storage/".$product->featured_image) }}" class="w-full h-48 object-cover rounded-lg mb-4">
@endif

                <h3 class="text-xl font-bold">
                    {{ $product->name }}
                </h3>

                <p class="mt-3">
                    السعر: {{ $product->price }} جنيه
                </p>

                <p class="mt-2">
                    المخزون: {{ $product->stock }}
                </p>

                <a href="{{ route('products.show', $product->id) }}"
                   class="inline-block mt-4 bg-blue-600 text-white px-4 py-2 rounded">

                    عرض المنتج

                </a>

<form action="{{ route('cart.add', $product->id) }}" method="GET">
<input type="number" name="quantity" value="1" min="1" class="border p-2 w-20">
<button class="bg-green-600 text-white px-4 py-2 rounded">🛒 أضف للسلة</button>
</form>
            </div>

        @endforeach

</div>

</body>

</html>
