<!DOCTYPE html>
<html>
<head>
    <title>Products</title>

    <style>
        body {
            font-family: Arial;
            padding: 20px;
        }

        table {
            width:100%;
            border-collapse: collapse;
        }

        th,td {
            border:1px solid #ddd;
            padding:10px;
        }

        a {
            text-decoration:none;
        }
    </style>
</head>

<body>

<h1>Products Store</h1>

<a href="{{ route('products.create') }}">
    Add Product
</a>

<br><br>

<table>

<tr>
    <th>Name</th>
    <th>Category</th>
    <th>Price</th>
    <th>Stock</th>
</tr>


@foreach($products as $product)

<tr>

<td>
{{ $product->name }}
</td>

<td>
{{ $product->category->name ?? 'No Category' }}
</td>

<td>
{{ $product->price }}
</td>

<td>
{{ $product->stock }}
</td>

</tr>

@endforeach


</table>

</body>
</html>
