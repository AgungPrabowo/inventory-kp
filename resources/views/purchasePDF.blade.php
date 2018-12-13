@extends('layouts.appPDF')

        @section('content')
        <div class="row">
            <div class="col">
                <h1>Daftar Barang Masuk</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Qty</th>
                        <th>Satuan</th>
                        <th>Harga</th>
                        <th>Kemasan</th>
                        <th>Tanggal</th>
                        <th>Supplier</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 1; @endphp
                        @foreach($data as $purchase)
                            @php
                                $purchase_product  = App\purchase::find($purchase['id'])->product()->associate(App\product::find($purchase['product_id']));
                                $purchase_supplier  = App\product::find($purchase['product_id'])->supplier()->associate(App\Supplier::find($purchase_product->product['supplier_id']));
                            @endphp
                            <tr>
                            <td>{{$i++}}</td>
                            <td>{{$purchase_product->product['product_name']}}</td>
                            <td>{{$purchase['purchase_qty']}}</td>
                            <td>{{$purchase_product->product['product_unit']}}</td>
                            <td>Rp. {{number_format($purchase_product->product['product_price'], 0, '', '.')}}</td>
                            <td>{{$purchase_product->product['product_packaging']}}</td>
                            <td>{{$purchase['purchase_date']}}</td>
                            <td>{{$purchase_supplier->supplier['supplier_name']}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endsection