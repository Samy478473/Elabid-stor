<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
</head>

<body>

<h1>Add New Product</h1>

<form action="{{ route('products.store') }}" method="POST">

@csrf

<label>Product Name</label>
<br>
<input type="text" name="name">

<br><br>

<label>Category</label>
<br>

<select name="category_id">

@foreach($categories as $category)

<option value="{{ $category->id }}">
{{ $category->name }}
</option>

@endforeach

</select>

<br><br>

<label>Description</label>
<br>

<textarea name="description"></textarea>

<br><br>

<label>Price</label>
<br>

<input type="number" step="0.01" name="price">

<br><br>

<label>Stock</label>
<br>

<input type="number" name="stock">

<br><br>

<button type="submit">
Save Product
</button>


</form>

</body>
</html>
