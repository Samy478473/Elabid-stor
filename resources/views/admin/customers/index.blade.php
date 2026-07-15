@extends('admin.layouts.app')

@section('content')

<div class="p-6">

    <h1 class="text-3xl font-bold mb-6">
        👥 العملاء
    </h1>

    <div class="bg-white rounded-xl shadow p-6">

        <table class="w-full">

            <thead class="bg-gray-100">

                <tr>
                    <th class="p-3 text-right">الاسم</th>
                    <th class="p-3 text-right">البريد</th>
                    <th class="p-3 text-right">تاريخ التسجيل</th>
                </tr>

            </thead>

            <tbody>

            @foreach($customers as $customer)

                <tr class="border-t">

                    <td class="p-3">
                        {{ $customer->name }}
                    </td>

                    <td class="p-3">
                        {{ $customer->email }}
                    </td>

                    <td class="p-3">
                        {{ $customer->created_at }}
                    </td>

                </tr>

            @endforeach

            </tbody>

        </table>

    </div>

</div>

@endsection
