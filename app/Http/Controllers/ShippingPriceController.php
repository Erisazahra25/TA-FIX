<?php

namespace App\Http\Controllers;

use App\Models\ShippingPrice;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ShippingPriceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $shippingPrices = ShippingPrice::all();
        return view('admin.shipping_price.index', compact('shippingPrices'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'city' => 'required|string',
            'price' => 'required|integer'
        ]);

        $shippingPrice = ShippingPrice::where('city', Str::upper($request['city']))->firstOrNew();
        $shippingPrice['city'] = Str::upper($request['city']);
        $shippingPrice['price'] = $request['price'];
        $shippingPrice->save();

        return redirect()->back()->withMessage('Shipping price created');
    }

    public function update(ShippingPrice $shippingPrice, Request $request)
    {
        $request->validate([
            'city' => 'required|string',
            'price' => 'required|integer'
        ]);

        $shippingPrice['city'] = Str::upper($request['city']);
        $shippingPrice['price'] = $request['price'];
        $shippingPrice->save();

        return redirect()->back()->withMessage('Shipping price updated');
    }

    public function destroy(ShippingPrice $shippingPrice)
    {
        if ($shippingPrice->orders->count() === 0) {
            $shippingPrice->delete();
            return redirect()->back()->withMessage('Shipping price deleted');
        }

        return redirect()->back()->withMessage('Shipping price contain order, can\'t deleted');
    }
}
