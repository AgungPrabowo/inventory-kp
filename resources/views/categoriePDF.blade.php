<!DOCTYPE html>
<html>
  <head>
  <!-- Bootstrap CSS-->
  <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Categorie List PT. Prima Mulya Sentosa</h1><br>
    <table class="table">
        <thead class="thead-dark">
            <tr>
            <th>ID</th>
            <th>Name</th>
            </tr>
        </thead>
        <tbody>
            @php $i = 1; @endphp
            @foreach($data as $categorie)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$categorie['categorie_name']}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
  </body>
</html>