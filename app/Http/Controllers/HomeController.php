<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\ShippingPrice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (auth()->user()['is_admin']) {
            return redirect('/order');
        }

        $products = Product::with('productDetails')->get();
        return view('home', compact('products'));
    }

    public function order(Request $request)
    {
        $currentUser = $request->user();
        $orders = $currentUser->orders()->where('status', '<>', 'draft')->get();
        return view('order.index', compact('orders'));
    }

    public function createOrder(Request $request)
    {
        $currentUser = $request->user();
        $draftOrder = $currentUser->orders()->where('status', 'draft')->firstOrCreate([
            'user_id' => $currentUser['id'],
            'status' => 'draft'
        ]);

        $products = Product::with('productDetails')->get();
        $shippingPrices = ShippingPrice::all();
        $cart = Cart::all();

        return view('order.create', compact('products', 'shippingPrices', 'draftOrder', 'cart'));
    }

    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id'
        ]);

        $product = Product::findOrFail($request['product_id']);
        $productDetails = $product->productDetails()->get()->toArray();
        $cart = new Cart();
        $cart->create([
            'product' => $product->toArray(),
            'productDetails' => $productDetails,
            'product_detail_id' => null,
            'amount' => 1
        ]);

        return redirect()->back();
    }

    public function removeFromCart($id)
    {
        $cart = new Cart();
        $cart->delete($id);

        return redirect()->back();
    }

    public function submitOrder(Request $request)
    {
        $request->validate([
            'product_detail_id' => 'required',
            'amount' => 'required',
            'shipping_address' => 'required|string',
            'shipping_price_id' => 'required|exists:shipping_prices,id'
        ]);

        for ($i = 0; $i < count($request['product_detail_id']); $i++) {
            $productDetail = ProductDetail::find($request['product_detail_id'][$i]);
            if ($productDetail['stock'] < $request['amount'][$i]) {
                return redirect()->back()->withErrors('Stock product ' . $productDetail->product['name'] . ' - ' . $productDetail['size'] . ' only ' . $productDetail['stock'] . ' left');
            }
        }
        $currentUser = $request->user();
        $order = $currentUser->orders()->where('status', 'draft')->first();
        DB::transaction(function () use ($request, $order, $currentUser) {
            $order['shipping_price_id'] = $request['shipping_price_id'];
            $order['shipping_address'] = $request['shipping_address'];
            $order['status'] = $order->nextStatus();
            $order->save();

            for ($i = 0; $i < count($request['product_detail_id']); $i++) {
                $productDetail = ProductDetail::find($request['product_detail_id'][$i]);
                $order->orderDetails()->create([
                    'product_detail_id' => $request['product_detail_id'][$i],
                    'amount' => $request['amount'][$i],
                    'price' => $productDetail['price'],
                    'buy_price' => $productDetail['buy_price'],
                ]);
                $productDetail['stock'] -= $request['amount'][$i];
                $productDetail->save();
            }
        });

        $cart = new Cart();
        $cart->destroy();

        return redirect()->route('my.order.detail.upload',$order['id'])->withMessage('Please transfer with following instructions');
    }

    public function buyAll(ProductDetail $productDetail){
        if($productDetail['stock'] == 0){
            return redirect()->back()->withErrors('Stock product habis');
        }

        $product = $productDetail->product;
        $productDetails = $product->productDetails()->where('id',$productDetail['id'])->get()->toArray();
        $cart = new Cart();
        $cart->destroy();
        $cart->create([
            'product' => $product->toArray(),
            'productDetails' => $productDetails,
            'product_detail_id' => $productDetail['id'],
            'amount' => $productDetail['stock']
        ]);

        return redirect('/my/order/new');
    }

    public function orderDetail(Order $order)
    {
        return view('order.show', compact('order'));
    }

    public function uploadForm(Order $order)
    {
        if($order['status'] !== 'pending_payment'){
            abort(404);
        }
        return view('order.upload', compact('order'));
    }

    public function updatePayment(Request $request, Order $order)
    {
        if($order['status'] !== 'pending_payment'){
            abort(404);
        }

        $request->validate([
            'payment_proof' => "file|mimes:jpeg,png,jpg,gif,svg|max:1000",
            'payment_proof_final' => "file|mimes:jpeg,png,jpg,gif,svg|max:1000",
            'dp' => 'required|integer|min:0',
            'value'=>'required|min:0'
        ]);

        $image_path = $order['payment_proof'];
        if ($request->file('payment_proof') != '') {
            $main_image = uniqid() . '.' . $request->file('payment_proof')->getClientOriginalExtension();
            $request->file('payment_proof')->move(storage_path('app/public/payment_proof'), $main_image);
            $image_path = '/storage/payment_proof/' . $main_image;
        }
        $order['payment_proof'] = $image_path;

        $image_path = $order['payment_proof_final'];
        if ($request->file('payment_proof_final') != '') {
            $main_image = uniqid() . '.' . $request->file('payment_proof_final')->getClientOriginalExtension();
            $request->file('payment_proof_final')->move(storage_path('app/public/payment_proof_final'), $main_image);
            $image_path = '/storage/payment_proof_final/' . $main_image;
        }
        $order['payment_proof_final'] = $image_path;
        $order['dp'] = $request['dp'];
        $order['totalDp'] = $request['totalDp'];
        $order['value'] = $request['value'];

        $order->save();

        return redirect()->route('my.order.detail', $order['id'])->withMessage('Payment proof uploaded');
    }

    public function shipping()
    {
        $shipping = ShippingPrice::all();
        return view('order.shipping', compact('shipping'));
    }

    public function updateDpt(Request $request, Order $order)
    {

        $order['dp'] = $request['updateDpt'];
        $order['value'] = $request['value'];
        $order->save();

        return redirect()->back()->withMessage('Order DP updated');
    }

}
