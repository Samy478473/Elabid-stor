<div class="p-5">

    <h1 class="text-2xl font-bold mb-8">
        🛒 الأبيض
    </h1>

    <nav class="space-y-3">

        <a href="{{ route('admin.dashboard') }}"
           class="block p-3 rounded-xl hover:bg-gray-100">
            🏠 لوحة التحكم
        </a>

        <a href="{{ route('categories.index') }}"
           class="block p-3 rounded-xl hover:bg-gray-100">
            📂 الأقسام
        </a>

        <a href="{{ route('admin.products.index') }}"
           class="block p-3 rounded-xl hover:bg-gray-100">
            📦 المنتجات
        </a>

        <a href="{{ route('products.create') }}"
           class="block p-3 rounded-xl hover:bg-gray-100">
            ➕ إضافة منتج
        </a>

        <a href="{{ route('admin.orders.index') }}"
           class="block p-3 rounded-xl hover:bg-gray-100">
            🛒 الطلبات
        </a>

        <a href="{{ route('admin.customers.index') }}"
           class="block p-3 rounded-xl hover:bg-gray-100">
            👥 العملاء
        </a>

    </nav>

</div>
