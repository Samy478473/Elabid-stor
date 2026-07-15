@extends('admin.layouts.app')

@section('content')

<div class="p-6">

<h1 class="text-3xl font-bold mb-6">
    🧾 تفاصيل الطلب
</h1>

<div class="bg-white rounded-xl shadow p-6 mb-6">

<p>
<strong>رقم الطلب:</strong>
{{ $order->order_number }}
</p>

<p>
<strong>العميل:</strong>
{{ $order->user->name ?? $order->customer_name }}
</p>

<p>
<strong>الهاتف:</strong>
{{ $order->customer_phone }}
</p>

<p>
<strong>العنوان:</strong>
{{ $order->customer_address }}
</p>

<p>
<strong>الإجمالي:</strong>
{{ $order->total_amount }} ج
</p>

<p>
<strong>الحالة:</strong>
{{ $order->status }}
</p>

</div>


<div class="bg-white rounded-xl shadow overflow-hidden">

<table class="w-full">

<thead class="bg-gray-100">

<tr>
<th class="p-3">المنتج</th>
<th class="p-3">الكمية</th>
<th class="p-3">السعر</th>
</tr>

</thead>

<tbody>

@foreach($order->items as $item)

<tr class="border-t">

<td class="p-3">
{{ $item->product->name ?? 'منتج' }}
</td>

<td class="p-3">
{{ $item->quantity }}
</td>

<td class="p-3">
{{ $item->price }} ج
</td>

</tr>

@endforeach

</tbody>

</table>

</div>

</div>


<div class="bg-white rounded-xl shadow p-6 mt-6">

<h2 class="text-xl font-bold mb-4">
    تحديث حالة الطلب
</h2>

<form method="POST" action="{{ route('admin.orders.updateStatus',$order) }}">

@csrf
@method('PUT')

<select name="status" class="border p-3 rounded w-full mb-4">

<option value="pending" {{ $order->status=='pending'?'selected':'' }}>
⏳ قيد الانتظار
</option>

<option value="processing" {{ $order->status=='processing'?'selected':'' }}>
⚙️ جاري التجهيز
</option>

<option value="shipped" {{ $order->status=='shipped'?'selected':'' }}>
🚚 تم الشحن
</option>

<option value="delivered" {{ $order->status=='delivered'?'selected':'' }}>
✅ تم التسليم
</option>

<option value="cancelled" {{ $order->status=='cancelled'?'selected':'' }}>
❌ ملغي
</option>

</select>


<button class="bg-green-600 text-white px-5 py-2 rounded">
حفظ الحالة
</button>

</form>

</div>

