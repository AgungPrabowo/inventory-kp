<!DOCTYPE html>
<html>
  <head>
  <!-- Bootstrap CSS-->
  <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Suppliers List PT. Prima Mulya Sentosa</h1><br>
    <table class="table">
        <thead class="thead-dark">
            <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Email</th>
            <th>Phone</th>
            <th>FAX</th>
            </tr>
        </thead>
        <tbody>
            @php $i = 1; @endphp
            @foreach($data as $supplier)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$supplier['supplier_name']}}</td>
                    <td>{{$supplier['supplier_address']}}</td>
                    <td>{{$supplier['supplier_email']}}</td>
                    <td>{{$supplier['supplier_phone']}}</td>
                    <td>{{$supplier['supplier_fax']}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
  </body>
</html>