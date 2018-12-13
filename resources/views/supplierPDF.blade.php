@extends('layouts.appPDF')

        @section('content')
        <div class="row">
            <div class="col">
                <h1>Daftar Supplier</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Alamat</th>
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
            </div>
        </div>
        @endsection