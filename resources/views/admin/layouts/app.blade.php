<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>
الأبيض Admin
</title>


<script src="https://cdn.tailwindcss.com"></script>

</head>


<body class="bg-gray-100">


<div class="flex min-h-screen">


    <aside class="w-64 bg-white shadow">

        @include('admin.partials.sidebar')

    </aside>



    <main class="flex-1 p-6">


        @include('admin.partials.navbar')


        @yield('content')


    </main>


</div>


</body>

</html>
