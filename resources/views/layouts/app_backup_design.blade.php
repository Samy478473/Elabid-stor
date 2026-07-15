<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الأبيض</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<nav class="bg-white shadow">

<div class="max-w-7xl mx-auto px-4 py-4">

<div class="flex flex-col md:flex-row md:justify-between md:items-center">

<h1 class="text-2xl font-bold text-center md:text-right mb-4 md:mb-0">
🛒 الأبيض
</h1>

<div class="flex flex-wrap justify-center gap-3 text-sm">

<a href="{{ route('store.home') }}" class="bg-blue-500 text-white px-3 py-2 rounded-lg">
الرئيسية
</a>

<a href="{{ route('store.products') }}" class="bg-blue-500 text-white px-3 py-2 rounded-lg">
المنتجات
</a>

<a href="{{ route('cart.index') }}" class="bg-green-500 text-white px-3 py-2 rounded-lg">
السلة
</a>

@auth

<a href="{{ route('dashboard') }}" class="bg-purple-500 text-white px-3 py-2 rounded-lg">
حسابي
</a>

<a href="{{ route('admin.dashboard') }}" class="bg-red-500 text-white px-3 py-2 rounded-lg">
الإدارة
</a>

<form action="{{ route('logout') }}" method="POST">
@csrf
<button class="bg-gray-800 text-white px-3 py-2 rounded-lg">
خروج
</button>
</form>

@else

<a href="{{ route('login') }}" class="bg-blue-700 text-white px-3 py-2 rounded-lg">
دخول
</a>

<a href="{{ route('register') }}" class="bg-green-700 text-white px-3 py-2 rounded-lg">
تسجيل
</a>

@endauth

</div>

</div>

</div>

</nav>

<div class="max-w-7xl mx-auto p-4">

@yield('content')

</div>

</body>

</html>
