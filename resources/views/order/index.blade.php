@extends('layouts.user')

@section('title') Order @stop

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body text-center">
                        <h1>THERE'S A LOT OF SHRIMP IN STOCK, HURRY UP TO ORDER</h1>
                        <a href="{{ route('my.order.new') }}" class="btn btn-success">BUY NOW</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">My Order List</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Shipping Address</th>
                                <th>Total item</th>
                                <th>Amount</th>
                                <th>Shipping Price</th>
                                <th>Total Amount</th>
                                <th>Dp</th>
                                <th>Missing Payment</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{ $order['created_at']->format('d-m-Y') }}</td>
                                    <td>{{ $order['shipping_address'] }}</td>
                                    <td>{{ $order['total_item'] }} ({{ $order['total_weight'] }} Kg)</td>
                                    <td>{{ $order['amount'] }}</td>
                                    <td>{{ $order->shippingPrice['city'] }}<br>
                                        {{ $order['total_shipping_price'] }}
                                    </td>
                                    <td>{{ formatPrice($order['total_payment']) }}</td>
                                    <td>{{ formatPrice($order['dp']) }}</td>

                                    @if(($order['status'] === 'done') OR ($order['status'] === 'success_payment'))
                                    <td>Payment Success</td>
                                    @else
                                    <td>{{formatPrice(($order['totalDp'])-($order['dp']))}}</td>
                                    @endif

                                    <td>{{ $order['status'] }}</td>
                                    <td>
                                        <a href="/my/order/invoice/{{ $order['id'] }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
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
@stop
