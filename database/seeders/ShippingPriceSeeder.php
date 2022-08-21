<?php

namespace Database\Seeders;

use App\Models\ShippingPrice;
use Illuminate\Database\Seeder;

class ShippingPriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ShippingPrice::insert([
            [
                "id" => 1,
                "city" => "SURABAYA",
                "price" => 5000.0,


            ],
            [
                "id" => 2,
                "city" => "LUMAJANG",
                "price" => 9000.0,


            ],
            [
                "id" => 3,
                "city" => "BANYUWANGI",
                "price" => 5000.0,


            ],
            [
                "id" => 4,
                "city" => "BALI",
                "price" => 6000.0,


            ],
            [
                "id" => 5,
                "city" => "JEMBER",
                "price" => 4000.0,


            ],
        ]);
    }
}
