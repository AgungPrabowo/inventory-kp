@extends('layouts.appPDF')

        @section('content')
        <div class="row">
            <div class="col">
                <h1>Daftar Produk</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <!-- <th>Kategori</th> -->
                        <th>Supplier</th>
                        <th>Satuan</th>
                        <th>Kemasan</th>
                        <th>Qty</th>
                        <!-- <th>Info</th> -->
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
                                <!-- <td>{{$product_categorie->categorie['categorie_name']}}</td> -->
                                <td>{{$product_supplier->supplier['supplier_name']}}</td>
                                <td>{{$product['product_unit']}}</td>
                                <td>{{$product['product_packaging']}}</td>
                                <td>{{$product['product_qty']}}</td>
                                <!-- <td>{{$product['product_info']}}</td> -->
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endsection