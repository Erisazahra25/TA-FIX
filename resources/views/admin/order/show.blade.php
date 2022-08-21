@extends('layouts.admin')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <i class="fas fa-shipping-fast"></i> {{ env('APP_NAME') }}
                                    <small class="float-right">Date: {{ $order->created_at->format('d-F-Y') }}</small>
                                </h4>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                From
                                <address>
                                    <strong>{{ env('APP_NAME') }}.</strong><br>
                                    Jl.Raya Jember KM 13, Jajang Surat<br>
                                    Kabat, Banyuwangi, Jawa Timur<br>
                                    Phone: 0333-6370079<br>
                                    Email: sedulurpds@yahoo.com
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                To
                                <address>
                                    <strong>{{ $order['user']['name'] }}</strong><br>
                                    {{ $order['shipping_address'] }}<br>
                                    Phone:-<br>
                                    Email: {{ $order['user']['email'] }}
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                <b>Invoice #{{ $order->created_at->timestamp }}/{{ $order['id'] }}</b><br>
                                <b>Payment Status : {{ $order['status'] }}</b><br>
                                <b>DueTime Payment : {{$order['created_at']->addMonth(1)->format('d-F-Y')}}</b><br><br>

                                <form action="/order/{{ $order['id'] }}/update-status" method="POST">
                                    @csrf
                                    <select name="status" id="cars" required>
                                        @foreach(\App\Models\Order::STATUS_OPTION as $status)
                                            <option
                                                value="{{ $status }}" {{ $status == $order['status']?'selected':'' }}>{{ $status }}</option>
                                        @endforeach
                                    </select>
                                    <button type="submit" class="btn btn-info btn-sm">update</button>
                                </form>

                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- Table row -->
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Qty</th>
                                        <th>Product</th>
                                        <th>Price /Kg</th>
                                        <th>Description</th>
                                        <th>Subtotal</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($order['orderDetails'] as $orderDetail)
                                        <tr>
                                            <td>{{ $orderDetail['amount'] }} Kg</td>
                                            <td>{{ $orderDetail['productDetail']['product']['name'] }}</td>
                                            <td>{{ $orderDetail['productDetail']['formatted_price'] }}</td>
                                            <td>{{ $orderDetail['productDetail']['product']['summary'] }}</td>
                                            <td>{{ formatPrice($orderDetail['amount'] * $orderDetail['productDetail']['price']) }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <!-- accepted payments column -->
                            <div class="col-6">
                                &nbsp;
                            </div>
                            <!-- /.col -->
                            <div class="col-6">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th style="width:50%">Subtotal:</th>
                                            <td>{{ $order['amount'] }}</td>
                                        </tr>
                                        <tr>
                                            <th>Shipping:</th>
                                            <td>{{ $order['total_shipping_price'] }}</td>
                                        </tr>
                                        <tr>
                                            <th>Total:</th>
                                            <td>{{ $order['total_payment'] }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <div class="row">
                            <div class="col-6">
                                @if($order['payment_proof'] !== null)
                                    <hr>
                                    <form action="/order/{{ $order['id'] }}/update-dp" method="POST">
                                    @csrf
                                    <h6>Payment (DP)</h6>
                                    <div class="row">
                                    <div class="col-4">
                                    <input type="text" class="form-control" name="updateDp" value="{{($order['dp'])}}">
                                    </div>
                                    <div class="col-2">
                                    <button type="submit" class="form-control btn btn-info btn-sm">update</button>
                                    </div>
                                    </div>
                                    </form>
                                    <hr>
                                    <h6>Proof Of Payment (DP)</h6>
                                    <img src="{{ $order['payment_proof'] }}" style="height: 300px; width: auto">
                                @endif
                            </div>
                            <div class="col-6">
                                <hr>
                                <hr>
                                <h6>Total Payment Must Be Pay</h6>
                                <p>{{formatPrice(($order['totalDp'])-($order['dp']))}}</p>
                                @if($order['payment_proof_final'] !== null)
                                    <h6>Proof Of Payment (DONE)</h6>
                                    <img src="{{ $order['payment_proof_final'] }}" style="height: 300px; width: auto">
                                @endif
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
