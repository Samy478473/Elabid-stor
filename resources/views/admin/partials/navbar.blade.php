<div class="bg-white shadow rounded-xl p-4 mb-6 flex flex-wrap justify-between items-center gap-3">

    <div>
        <h2 class="text-xl font-bold">
            إدارة متجر الأبيض
        </h2>

        <p class="text-gray-500">
            مرحبًا بك في لوحة التحكم
        </p>
    </div>


    <div class="flex gap-3 items-center">

        <a href="{{ route('admin.dashboard') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded-xl">
            🏠 الإدارة
        </a>

        <a href="{{ url('/') }}"
           class="bg-green-600 text-white px-4 py-2 rounded-xl">
            🌐 المتجر
        </a>

    </div>

</div>
