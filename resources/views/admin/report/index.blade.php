@extends('layouts.admin')

@section('title') Report List @stop

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Report List</h3>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="card">
                                <div class="card-body text-center">
                                    <h4>Complete transaction</h4>
                                    <h2>{{ formatPrice($totalComplete) }}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card">
                                <div class="card-body text-center">
                                    <h4>Pending transaction</h4>
                                    <h2>{{ formatPrice($totalPending) }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="" method="GET">
                            <label>Start : </label>
                            <input type="date" class="form-control col-md-4" name="start_date" value="{{ isset($_GET['start_date'])?$_GET['start_date']:now()->format('Y-m-d') }}">
                            <label>End : </label>
                            <input type="date" class="form-control col-md-4" name="end_date" value="{{ isset($_GET['end_date'])?$_GET['end_date']:now()->format('Y-m-d') }}">
                            <p></p>
                            <button type="submit"  class="form-control btn btn-pro btn-info btn-s col-md-2" >Filter</button>
                        </form>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>User</th>
                                <th>Shipping Address</th>
                                <th>Total item</th>
                                <th>Amount</th>
                                <th>Shipping Price</th>
                                <th>Total Amount</th>
                                <th>Status</th>
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
                                    <td>{{ $order->shippingPrice['city'] }}<br>
                                        {{ $order['total_shipping_price'] }}
                                    </td>
                                    <td>{{ $order['total_payment'] }}</td>
                                    <td>{{ $order['status'] }}</td>
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
