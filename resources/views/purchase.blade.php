@extends('layouts.app')
@extends('layouts.header')

            @section('content')
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createmodal"><i class="fa  fa-plus-square"></i> Buat Barang Masuk</button>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#printmodal"><i class="fa  fa-print"></i> Cetak</button>
                                    <!-- <a href="{{ URL::to('/purchase/printPurchases') }}" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Cetak </a> -->
                                </div>
                                <div class="table-responsive table--no-card m-b-30">
                                    @if (\Session::has('info'))
                                    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                        <span class="badge badge-pill badge-success">Success</span>
                                        {{ \Session::get('info') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @endif
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>Nama</th>
                                                <th>Harga</th>
                                                <th>Qty</th>
                                                <th>Tanggal</th>
                                                <th colspan="1">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @php $i = 1; @endphp
                                        @foreach($purchases as $purchase)
                                            @php
                                                $purchase_product  = App\purchase::find($purchase['id'])->product()->associate(App\product::find($purchase['product_id']));
                                                $purchase_supplier  = App\product::find($purchase['product_id'])->supplier()->associate(App\Supplier::find($purchase_product->product['supplier_id']));
                                            @endphp
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$purchase_product->product['product_name']}}</td>
                                                <td>{{$purchase_product->product['product_price']}}</td>
                                                <td>{{$purchase['purchase_qty']}}</td>
                                                <td>{{$purchase['purchase_date']}}</td>
                                                <td><button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deletemodal{{$purchase['id']}}"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- modal -->
            @foreach($purchases as $purchase)

            <div class="modal fade" id="deletemodal{{$purchase['id']}}" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="smallmodalLabel">Hapus Barang Masuk</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <form action="{{ action('PurchasesController@destroy', $purchase['id']) }}" method="post">
                            @csrf

                            <div class="form-group">
                                <div class="input-group">
                                    <p>Apakah kamu yakin?</p>
                                    <input type="hidden" name="id" value="{{$purchase['id']}}">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-danger">Confirm</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach

            <div class="modal fade" id="createmodal" tabindex="-1" role="dialog" aria-labelledby="mediummodalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediummodalLabel">Buat Barang Masuk</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('purchase') }}" method="post">
                            @csrf
                            
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <select type="text" name="product_id" class="form-control" required>
                                            <option value="">Pilih Produk</option>
                                            @foreach($products as $product)
                                            <option value="{{$product['id']}}">{{$product['product_name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-table"></i>
                                        </div>
                                        <input type="text" name="purchase_qty" placeholder="Qty" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar-o"></i>
                                        </div>
                                        <input type="date" name="purchase_date" rows="5" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-actions form-group">
                                    <button type="submit" class="btn btn-success btn-sm">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="printmodal" tabindex="-1" role="dialog" aria-labelledby="mediummodalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediummodalLabel">Cetak Barang Masuk</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('purchasePDF') }}" class="form-horizontal" method="post" target="_blank">
                            @csrf
                            
                                <div class="row form-group">
                                    <div class="col col-sm-12">
                                        <label for="start date" class="pr-1  form-control-label">Mulai Tanggal</label>
                                        <input type="date" name="start_date" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-sm-12">
                                        <label for="to date" class="pr-1  form-control-label">Sampai Tanggal</label>
                                        <input type="date" name="to_date" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-actions form-group">
                                    <button type="submit" class="btn btn-success btn-sm">Cetak</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div id="container"></div>
            <!-- end modal -->
            @endsection

