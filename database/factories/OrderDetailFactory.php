<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\ProductDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $order = Order::pluck('id')->toArray();
        $productDetail = ProductDetail::pluck('price', 'id')->toArray();
        $amountList = [1, 3, 5, 7, 9, 11, 12, 8, 6, 4];

        $pd = array_rand($productDetail, 2)[0];
        $orderId = array_rand($order, 2)[0];
        $amount = array_rand($amountList, 2)[0];

        return [
            'order_id' => $orderId == 0 ? $orderId + 1 : $orderId,
            'product_detail_id' => $pd,
            'amount' => $amount == 0 ? $amount + 1 : $amount,
            'price' => $productDetail[$pd],
            'buy_price' => $productDetail[$pd] - 10000,
        ];
    }
}
