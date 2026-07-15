<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إتمام الطلب</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<div class="max-w-3xl mx-auto mt-10 bg-white rounded-xl shadow p-8">

    <h1 class="text-3xl font-bold mb-6">
        إتمام الطلب
    </h1>

    <form method="POST" action="{{ route('order.store') }}">

        @csrf

        <div class="mb-4">
            <label class="block mb-2">الاسم</label>
            <input
                type="text"
                name="customer_name"
                class="w-full border rounded p-3"
                required>
        </div>

        <div class="mb-4">
            <label class="block mb-2">رقم الهاتف</label>
            <input
                type="text"
                name="customer_phone"
                class="w-full border rounded p-3"
                required>
        </div>

        <div class="mb-4">
            <label class="block mb-2">العنوان</label>
            <textarea
                name="customer_address"
                class="w-full border rounded p-3"
                rows="4"
                required></textarea>
        </div>

        <button
            class="bg-green-600 text-white px-6 py-3 rounded-xl">

            تأكيد الطلب

        </button>

    </form>

</div>

</body>
</html>
