<?php

namespace App\Http\Controllers;

use App\Models\HistoryStock;
use App\Models\HistoryPrice;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        if (isset($request['start_date']) && isset($request['end_date'])) {
            $orders = Order::where('status', 'done')
                ->whereDate('created_at', '>=', $request['start_date'])
                ->whereDate('created_at', '<=', $request['end_date'])
                ->get();
            $pendingOrders = Order::whereNotIn('status', ['done', 'draft'])
                ->whereDate('created_at', '>=', $request['start_date'])
                ->whereDate('created_at', '<=', $request['end_date'])
                ->get();
        } else {
            $orders = Order::where('status', 'done')->get();
            $pendingOrders = Order::whereNotIn('status', ['done', 'draft'])->get();
        }

        $totalPending = 0;
        $totalComplete = 0;
        foreach ($pendingOrders as $pendingOrder) {
            $totalPending += ($pendingOrder->amount() + $pendingOrder->totalShippingPrice());
        }
        foreach ($orders as $completeOrder) {
            $totalComplete += ($completeOrder->amount() + $completeOrder->totalShippingPrice());
        }

        return view('admin.report.index', compact('orders', 'totalComplete', 'totalPending'));
    }

    public function reports(Request $request){
        // Gain loss
        if (isset($request['start_date']) && isset($request['end_date'])) {
            $orders = Order::where('status', 'done')
                ->whereDate('created_at', '>=', $request['start_date'])
                ->whereDate('created_at', '<=', $request['end_date'])
                ->get();
        } else {
            $orders = Order::where('status', 'done')->get();
        }

        $modal = 0;
        $omset = 0;
        $totalAmount = 0;
        $untungRugi = 0;
        foreach($orders as $order){
            $modal += $order->modal();
            $omset += $order->amount();
            $totalAmount += $order['total_weight'];
        }
        $untungRugi = ($omset-$modal)*(100-0.25)/100;

        $product = Product::all();
        $resultProduct = [];
        foreach ($product as $item) {
            $subTotal = 0;
            foreach ($item->productDetails()->get() as $pdl) {
                $subTotal += $pdl->orderDetails()->sum('amount');
            }

            $resultProduct [] = [
                'name'=>$item->name,
                'subTotal'=> $subTotal
            ];
        }
        return view('admin.report.reports',compact('modal','omset','untungRugi','orders','totalAmount','resultProduct'));
    }

    public function stocksHistory(){
        $historyStocks = HistoryStock::with('productDetail.product')->get();

        return view('admin.report.stock', compact('historyStocks'));
    }

    public function pricesHistory(){
        $historyPrices = HistoryPrice::with('productDetail.product')->get();

        return view('admin.report.price', compact('historyPrices'));
    }

}
