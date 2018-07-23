@extends('layouts.app')
@extends('layouts.header')

            @section('content')
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="card">
                                    <div class="card-header">Create Categorie</div>
                                    <div class="card-body card-block">
                                        <form action="{{ route('categorie') }}" method="post">
                                            @csrf

                                            <div class="form-group">
                                                @if (\Session::has('info'))
                                                <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                                    <span class="badge badge-pill badge-success">Success</span>
                                                    {{ \Session::get('info') }}
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                @endif
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </div>                                                    
                                                    <input type="text" name="categorie_name" placeholder="Categorie Name" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="form-actions form-group">
                                                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>Categorie Name</th>
                                                <th colspan="2" class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @php $i = 1; @endphp
                                        @foreach($categories as $categorie)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$categorie['categorie_name']}}</td>
                                                <td><button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editmodal{{$categorie['id']}}"><i class="fa fa-edit"></i></button>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deletemodal{{$categorie['id']}}"><i class="fa fa-trash"></i></button>
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
            @foreach($categories as $categorie)
            <div class="modal fade" id="editmodal{{$categorie['id']}}" tabindex="-1" role="dialog" aria-labelledby="mediummodalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediummodalLabel">Edit Categorie</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <form action="{{ action('CategorieController@update', $categorie['id']) }}" method="post">
                            @csrf

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <input type="hidden" name="id" value="{{$categorie['id']}}">
                                    <input type="text" name="categorie_name" placeholder="Categorie Name" class="form-control" value="{{$categorie['categorie_name']}}" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Confirm</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="deletemodal{{$categorie['id']}}" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="smallmodalLabel">Delete Categorie</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <form action="{{ action('CategorieController@destroy', $categorie['id']) }}" method="post">
                            @csrf

                            <div class="form-group">
                                <div class="input-group">
                                    <p>Are you sure?</p>
                                    <input type="hidden" name="id" value="{{$categorie['id']}}">
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
            <!-- end modal -->
            @endsection

