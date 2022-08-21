@extends('layouts.admin')

@section('title') Product Detail @stop

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Product Detail</h3>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4 text-right">
                                    <img src="{{ $product['image'] }}" style="height: 200px; width: auto">
                                </div>
                                <div class="col-8">
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <td>Name</td>
                                            <td colspan="2">{{ $product['name'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Summary</td>
                                            <td colspan="2">{{ $product['summary'] }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">Description : <br>
                                                {{ $product['description'] }}
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <button class="btn btn-success" data-toggle="modal" data-target="#addData"><i
                                class="fas fa-plus"></i> Add Product Variant
                        </button>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Size</th>
                                <th>Price /Kg</th>
                                <th>Stock</th>
                                <th>Buy Price /Kg</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($product->productDetails()->get() as $productVariant)
                                <tr>
                                    <td>{{ $productVariant['updated_at'] }}</td>
                                    <td>{{ $productVariant['size'] }}</td>
                                    {{-- <td>{{ $productVariant['formatted_price'] }}</td> --}}
                                        <form action="{{ route('productVariant.update', $productVariant['id']) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="PATCH">
                                            <td>
                                                <input type="number" name="price" value="{{ $productVariant['price'] }}" required onkeyup="$('#btn-update-productVariantPrice-{{ $productVariant['id'] }}').show()">
                                                <button type="submit" class="btn btn-sm btn-primary" style="display: none" id="btn-update-productVariantPrice-{{ $productVariant['id'] }}">Update Price</button>
                                            </td>
                                            <td>
                                                <input type="number" name="stock" value="{{ $productVariant['stock'] }}" required onkeyup="$('#btn-update-productVariant-{{ $productVariant['id'] }}').show()">
                                                <button type="submit" class="btn btn-sm btn-primary" style="display: none" id="btn-update-productVariant-{{ $productVariant['id'] }}">Update Stock</button>
                                            </td>
                                            <td>
                                                <input type="number" name="buy_price" value="{{ $productVariant['buy_price'] }}" required onkeyup="$('#btn-update-productVariantBuyPrice-{{ $productVariant['id'] }}').show()">
                                                <button type="submit" class="btn btn-sm btn-primary" style="display: none" id="btn-update-productVariantBuyPrice-{{ $productVariant['id'] }}">Update Buy Price</button>
                                            </td>
                                        </form>
                                    <td>
                                        <form
                                            action="{{ route('productVariant.remove', $productVariant['id']) }}"
                                            method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-sm btn-danger"><i
                                                    class="fas fa-trash"></i></button>
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
                    <h4 class="modal-title">Add Product Variant</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="{{ route('productVariant.add', $product['id']) }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label>Size</label>
                            <input type="number" min="0" class="form-control" name="size" required>
                        </div>
                        <div class="form-group">
                            <label>Price per Kg</label>
                            <input type="number" min="0" class="form-control" name="price" required>
                        </div>
                        <div class="form-group">
                            <label>Stock (Kg)</label>
                            <input type="number" min="0" class="form-control" name="stock" required>
                        </div>

                        <div class="form-group">
                            <label>Buy Price (Kg)</label>
                            <input type="number" min="0" class="form-control" name="buy_price" required>
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
@stop
