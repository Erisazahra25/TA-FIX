<?php

namespace Database\Factories;

use App\Models\ShippingPrice;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::pluck('id')->toArray();
        $shipping = ShippingPrice::pluck('id')->toArray();

        $day = [1, 2, 3, 4, 5, 6, 7, 8, 9, 14, 21, 30, 35, 46];

        $userId = array_rand($user, 2)[0];
        $shippingPrice = array_rand($shipping, 2)[0];

        return [
            'user_id' => $userId < 1 ? 2 : $userId,
            'shipping_price_id' => $shippingPrice == 0 ? $shippingPrice + 1 : $shippingPrice,
            'shipping_address' => $this->faker->address(),
            'status' => 'done',
            'payment_proof' => 'https://tangerangonline.id/wp-content/uploads/2021/06/IMG-20210531-WA0027.jpg',
            'payment_proof_final' => 'https://tangerangonline.id/wp-content/uploads/2021/06/IMG-20210531-WA0027.jpg',
            'created_at' => now()->subDays(array_rand($day)),
        ];
    }
}
