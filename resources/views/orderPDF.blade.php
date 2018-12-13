@extends('layouts.appPDF')

        @section('content')
        <div class="row">
            <div class="col">
                <h1>Daftar Barang Keluar</h1>
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
                        <th>Harga</th>
                        <th>Tanggal</th>
                        <th>Info</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 1; @endphp
                        @foreach($data as $order)
                            @php
                                $order_product  = App\order::find($order['id'])->product()->associate(App\product::find($order['product_id']));
                            @endphp
                            <tr>
                            <td>{{$i++}}</td>
                            <td>{{$order_product->product['product_name']}}</td>
                            <td>{{$order['order_qty']}}</td>
                            <td>{{$order_product->product['product_date']}}</td>
                            <td>{{$order['order_date']}}</td>
                            <td>{{$order['order_info']}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endsection