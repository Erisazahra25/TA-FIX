@extends('layouts.admin')

@section('title') Sales Report @stop

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Income Statement</h3>
                    </div>

                    <div class="row">
                        <div class="col-3">
                            <div class="card">
                                <div class="card-body text-center">
                                    <h4>Capital</h4>
                                    <h2>{{formatPrice($modal)}}</h2>
                                    <label>purchasing shrimp in the pond</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card">
                                <div class="card-body text-center">
                                    <h4>Omset</h4>
                                    <h2>{{formatPrice($omset)}}</h2>
                                    <label>total revenue earned by the company</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card">
                                <div class="card-body text-center">
                                    <h4>{{ $untungRugi >= 0 ? 'Profit':'Loss'}}</h4>
                                    <h2>{{formatPrice($untungRugi)}}</h2>
                                    <label> omset - tax 0.25%</label>

                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card">
                                <div class="card-body text-center">
                                    <h4>Total Sold</h4>
                                    <h2>{{ $totalAmount }} Kg</h2>
                                    <label>total shrimp sold</label>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($resultProduct as $category)
                        <div class="col-3">
                            <div class="card">
                                <div class="card-body text-center">
                                    <h4>{{ $category['name'] }}</h4>
                                    <h2>{{ $category['subTotal'] }} Kg</h2>

                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="" method="GET">
                            <label>Start : </label>
                            <input type="date" class="form-control col-md-4" name="start_date" value="{{ isset($_GET['start_date'])?$_GET['start_date']:now()->format('Y-m-d') }}">
                            <label>End : </label>
                            <input type="date" class="form-control col-md-4" name="end_date" value="{{ isset($_GET['end_date'])?$_GET['end_date']:now()->format('Y-m-d') }}">
                            <p></p>
                            <button type="submit" class="form-control btn btn-pro btn-info btn-s col-md-2">Filter</button>
                        </form>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Customer's Name</th>
                                <th>Shipping Adress</th>
                                <th>Total Item</th>
                                <th>Omset</th>
                                <th>Capital</th>
                                <th>PPH</th>
                                <th>Profit</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                <tr>
                                    <td>{{ $order['created_at'] }}</td>
                                    <td>{{ $order['user']['name'] }}</td>
                                    <td>{{ $order['shipping_address'] }}</td>
                                    <td>{{ $order['total_item'] }} ({{ $order['total_weight'] }} Kg)</td>
                                    <td>{{ $order['amount'] }}</td>
                                    <td>{{ $order['modal'] }}</td>
                                    <td>{{ $order['pajak'] }}</td>
                                    <td>{{ $order['untung'] }}</td>

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
