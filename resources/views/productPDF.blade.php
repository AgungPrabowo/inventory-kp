<!DOCTYPE html>
<html>
  <head>
  <!-- Bootstrap CSS-->
  <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Product List PT. Prima Mulya Sentosa</h1><br>
    <table class="table">
        <thead class="thead-dark">
            <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Categorie</th>
            <th>Supplier</th>
            <th>Qty</th>
            <th>Information</th>
            </tr>
        </thead>
        <tbody>
            @php $i = 1; @endphp
            @foreach($data as $product)
                @php
                    $product_supplier  = App\product::find($product['id'])->supplier()->associate(App\Supplier::find($product['supplier_id']));
                    $product_categorie  = App\product::find($product['id'])->categorie()->associate(App\Categorie::find($product['categorie_id']));
                @endphp
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$product['product_name']}}</td>
                    <td>Rp. {{number_format($product['product_price'], 0, '', '.')}}</td>
                    <td>{{$product_categorie->categorie['categorie_name']}}</td>
                    <td>{{$product_supplier->supplier['supplier_name']}}</td>
                    <td>{{$product['product_qty']}}</td>
                    <td>{{$product['product_info']}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
  </body>
</html>