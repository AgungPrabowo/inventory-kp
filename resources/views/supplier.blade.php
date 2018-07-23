@extends('layouts.app')
@extends('layouts.header')

            @section('content')
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-header">Create Supplier</div>
                                    <div class="card-body card-block">
                                        <form action="{{ route('supplier') }}" method="post">
                                            @csrf

                                            
                                            <div class="form-group">
                                                @if (\Session::has('success'))
                                                <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                                    <span class="badge badge-pill badge-success">Success</span>
                                                    {{ \Session::get('success') }}
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                @endif
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                    <input type="text" name="supplier_name" placeholder="name" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-envelope"></i>
                                                    </div>
                                                    <textarea type="text" name="supplier_address" rows="5" placeholder="Address" class="form-control" required></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-asterisk"></i>
                                                    </div>
                                                    <input type="email" name="supplier_email" placeholder="Email" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-asterisk"></i>
                                                    </div>
                                                    <input type="text" name="supplier_phone" placeholder="Phone" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-asterisk"></i>
                                                    </div>
                                                    <input type="text" name="supplier_fax" placeholder="Fax" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-actions form-group">
                                                <button type="submit" class="btn btn-success btn-sm">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th colspan="2" class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @php $i = 1; @endphp
                                        @foreach($suppliers as $supplier)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$supplier['supplier_name']}}</td>
                                                <td>{{$supplier['supplier_email']}}</td>
                                                <td>{{$supplier['supplier_phone']}}</td>
                                                <td><button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editmodal{{$supplier['id']}}"><i class="fa fa-edit"></i></button>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deletemodal{{$supplier['id']}}"><i class="fa fa-trash"></i></button></td>
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
            @endsection

