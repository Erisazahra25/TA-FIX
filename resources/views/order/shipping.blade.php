@extends('layouts.user')

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
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>City</th>
                                <th>Price</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($shipping as $data )
                                <tr>
                                    <td>{{ $data['city']}}</td>
                                    <td>{{ $data['price']}}</td>
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

@stop
