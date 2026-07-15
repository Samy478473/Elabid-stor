<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>إضافة منتج</title>

    <style>
        body {
            font-family: Arial;
            background: #f5f5f5;
            padding:20px;
        }

        .box {
            max-width:600px;
            margin:auto;
            background:white;
            padding:20px;
            border-radius:10px;
        }

        input, textarea, select, button {
            width:100%;
            padding:12px;
            margin:8px 0;
        }

        button {
            background:#222;
            color:white;
            border:0;
            cursor:pointer;
        }
    </style>

</head>

<body>

<div class="box">

<h2>إضافة منتج جديد</h2>

@if(session('success'))
<p>{{ session('success') }}</p>
@endif


<form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">

@csrf


<select name="category_id" required>

<option value="">
اختر التصنيف
</option>

@foreach($categories as $category)

<option value="{{ $category->id }}">
{{ $category->name }}
</option>

@endforeach

</select>


<input 
type="text"
name="name"
placeholder="اسم المنتج"
required>


<textarea
name="description"
placeholder="وصف المنتج"
required></textarea>


<input
type="number"
name="price"
placeholder="السعر"
required>


<input
type="number"
name="sale_price"
placeholder="سعر الخصم">


<input
type="number"
name="stock"
placeholder="الكمية"
required>


<input
type="number"
name="weight"
placeholder="الوزن">


<label>
<input type="checkbox" name="featured">
منتج مميز
</label>


<input
type="file"
name="image">


<button type="submit">
حفظ المنتج
</button>


</form>

</div>

</body>
</html>
