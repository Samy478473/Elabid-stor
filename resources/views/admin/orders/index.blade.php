@extends('admin.layouts.app')

@section('content')

<div class="p-6">

<h1 class="text-3xl font-bold mb-6">
    🛒 الطلبات
</h1>

<div class="bg-white rounded-xl shadow overflow-hidden">

<table class="w-full">

<thead class="bg-gray-100">

<tr>
    <th class="p-3">رقم الطلب</th>
    <th class="p-3">العميل</th>
    <th class="p-3">الإجمالي</th>
    <th class="p-3">الحالة</th>
    <th class="p-3">التحكم</th>
</tr>

</thead>

<tbody>

@foreach($orders as $order)

<tr class="border-t">

<td class="p-3">
    {{ $order->order_number }}
</td>

<td class="p-3">
    {{ $order->user->name ?? $order->customer_name }}
</td>

<td class="p-3">
    {{ $order->total_amount }} ج
</td>

<td class="p-3">

@if($order->status == 'pending')
    ⏳ قيد الانتظار
@elseif($order->status == 'processing')
    ⚙️ جاري التجهيز
@elseif($order->status == 'shipped')
    🚚 تم الشحن
@elseif($order->status == 'delivered')
    ✅ تم التسليم
@else
    ❌ ملغي
@endif

</td>

<td class="p-3">

<a href="{{ route('admin.orders.show',$order) }}"
class="bg-blue-600 text-white px-3 py-2 rounded">
👁 تفاصيل
</a>

</td>

</tr>

@endforeach

</tbody>

</table>

</div>

</div>

@endsection
