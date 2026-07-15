

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }} - MultiStore</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<header class="bg-white shadow p-5 flex justify-between items-center">
    <h1 class="text-3xl font-bold">🛒 MultiStore</h1>

    <a href="{{ route('cart.index') }}"
       class="bg-blue-600 text-white px-4 py-2 rounded-lg">
        🛍 السلة
    </a>
</header>

<div class="max-w-4xl mx-auto mt-10">

    <div class="bg-white rounded-xl shadow-lg p-8">

        <h2 class="text-3xl font-bold mb-6">
            {{ $product->name }}
        </h2>

        <p class="text-2xl text-green-700 font-bold mb-4">
            {{ $product->price }} جنيه
        </p>

        <p class="text-gray-700 mb-6">
            {{ $product->description }}
        </p>

        <p class="mb-8">
            <strong>المخزون:</strong>
            {{ $product->stock }}
        </p>

        <a href="{{ route('cart.add', $product) }}"
           class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg">
            ➕ أضف إلى السلة
        </a>

        <a href="{{ route('store.products') }}"
           class="mr-3 bg-gray-600 hover:bg-gray-700 text-white px-6 py-3 rounded-lg">
            ⬅ العودة للمنتجات
        </a>

    </div>

</div>

</body>
</html>
