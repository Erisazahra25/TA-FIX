@extends('layouts.admin')

@section('title') Shipping Price @stop

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Shipping Price List</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <button class="btn btn-success" data-toggle="modal" data-target="#addData"><i
                                class="fas fa-plus"></i> Add data
                        </button>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>City</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($shippingPrices as $shippingPrice)
                                <tr>
                                    <td>{{ $shippingPrice['city'] }}</td>
                                    <td>{{ $shippingPrice['formatted_price'] }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#editData"
                                                onclick="$('#form-edit').attr('action', '/shipping_price/{{ $shippingPrice['id'] }}');
                                                $('#form-edit-city').val('{{ $shippingPrice['city'] }}');
                                                $('#form-edit-price').val('{{ $shippingPrice['price'] }}')"><i class="fas fa-edit"></i></button>

                                        <button type="submit" class="btn btn-sm btn-danger" onclick="$('#delete-{{ $shippingPrice['id'] }}').submit()"><i class="fas fa-trash"></i></button>
                                        <form id="delete-{{ $shippingPrice['id'] }}" action="{{ route('shipping_price.destroy', $shippingPrice['id']) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">

                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>

    <div id="addData" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Shipping Price</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="{{ route('shipping_price.store') }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label>City Name</label>
                            <input type="text" class="form-control" name="city" required>
                        </div>
                        <div class="form-group">
                            <label>Price (Rp)</label>
                            <input type="number" min="0" class="form-control" name="price" required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <div id="editData" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Shipping Price</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form id="form-edit" action="#" method="POST">
                    <input type="hidden" name="_method" value="PUT">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label>City Name</label>
                            <input type="text" id="form-edit-city" class="form-control" name="city" required>
                        </div>
                        <div class="form-group">
                            <label>Price (Rp)</label>
                            <input type="number" id="form-edit-price" min="0" class="form-control" name="price" required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info">Update</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

@stop
