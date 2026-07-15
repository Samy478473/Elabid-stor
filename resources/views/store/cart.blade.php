<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>سلة المشتريات</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<div class="max-w-4xl mx-auto mt-10">

    <div class="bg-white rounded-xl shadow p-6">

        <h1 class="text-3xl font-bold mb-6">
            🛒 سلة المشتريات
        </h1>

        @if(session('error'))
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        @if(count($cart) == 0)

            <div class="text-center py-10">
                <h2 class="text-2xl font-bold">
                    السلة فارغة
                </h2>

                <a href="{{ route('store.products') }}"
                   class="inline-block mt-6 bg-blue-600 text-white px-6 py-3 rounded-lg">
                    العودة للمنتجات
                </a>
            </div>

        @else

            @php $total = 0; @endphp

            @foreach($cart as $id => $item)

                @php
                    $lineTotal = $item['price'] * $item['quantity'];
                    $total += $lineTotal;
                @endphp

                <div class="border-b py-4 flex justify-between items-center">

                    <div>
                        <h3 class="text-xl font-bold">{{ $item['name'] }}</h3>
                        <p>السعر: {{ $item['price'] }} جنيه</p>
<form action="{{ route('cart.update',$id) }}" method="GET">
<input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="border p-2 w-20">
<button class="bg-blue-600 text-white px-3 py-1 rounded">تحديث</button>
</form>
                        <p class="font-bold">الإجمالي: {{ $lineTotal }} جنيه</p>
                    </div>

                    <div>
                        <a href="{{ route('cart.remove',$id) }}"
                           class="text-red-600 font-bold">
                            حذف
                        </a>
                    </div>

                </div>

            @endforeach

            <div class="mt-6">

                <h2 class="text-2xl font-bold mb-5">
                    الإجمالي الكلي: {{ $total }} جنيه
                </h2>

                <a href="{{ route('checkout') }}"
                   class="bg-green-600 text-white px-8 py-3 rounded-lg">
                    ✅ إتمام الطلب
                </a>

            </div>

        @endif

    </div>

</div>

</body>
</html>
