<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::insert([
            [
                "id" => 1,
                "name" => "MOLTING",
                "image" => "/storage/images/profile/629c359a857ef.jpg",
                "summary" => "udang tawar ",
                "description" => "Vannamei shrimp (Litopenaeus vannamei) known aS white shrimp is a native species introduced from the waters of Central America and the countries of Central and South America such as Ecuador, Venezuela, Panama, Brazil and Mexico recently cultivated in Indonesia.",

            ],
            [
                "id" => 2,
                "name" => "FRESH",
                "image" => "/storage/images/profile/629c359a857ef.jpg",
                "summary" => "udang air laut",
                "description" => "Vannamei shrimp (Litopenaeus vannamei) known aS white shrimp is a native species introduced from the waters of Central America and the countries of Central and South America such as Ecuador, Venezuela, Panama, Brazil and Mexico recently cultivated in Indonesia.",


            ],
            [
                "id" => 3,
                "name" => "TRIPLE",
                "image" => "/storage/images/profile/629c359a857ef.jpg",
                "summary" => "Udang Triple",
                "description" => "Vannamei shrimp (Litopenaeus vannamei) known aS white shrimp is a native species introduced from the waters of Central America and the countries of Central and South America such as Ecuador, Venezuela, Panama, Brazil and Mexico recently cultivated in Indonesia.",


            ],
            [
                "id" => 4,
                "name" => "LOBSTER",
                "image" => "/storage/images/profile/629c359a857ef.jpg",
                "summary" => "Udang Merah",
                "description" => "Vannamei shrimp (Litopenaeus vannamei) known aS white shrimp is a native species introduced from the waters of Central America and the countries of Central and South America such as Ecuador, Venezuela, Panama, Brazil and Mexico recently cultivated in Indonesia.",


            ],
        ]);

        ProductDetail::insert([
            [
                "id" => 1,
                "product_id" => 1,
                "size" => 30,
                "price" => 30000.0,
                "stock" => 200,
                "buy_price" => 20000.0,
                "created_at" => now(),
                "updated_at" => now()



            ],
            [
                "id" => 2,
                "product_id" => 1,
                "size" => 50,
                "price" => 40000.0,
                "stock" => 10,
                "buy_price" => 30000.0,
                "created_at" => now(),
                "updated_at" => now()


            ],
            [
                "id" => 3,
                "product_id" => 1,
                "size" => 60,
                "price" => 90000.0,
                "stock" => 300,
                "buy_price" => 80000.0,
                "created_at" => now(),
                "updated_at" => now()


            ],
            [
                "id" => 4,
                "product_id" => 2,
                "size" => 10,
                "price" => 40000.0,
                "stock" => 100,
                "buy_price" => 30000.0,
                "created_at" => now(),
                "updated_at" => now()

            ],
            [
                "id" => 5,
                "product_id" => 2,
                "size" => 30,
                "price" => 50000.0,
                "stock" => 400,
                "buy_price" => 40000.0,
                "created_at" => now(),
                "updated_at" => now()


            ],
            [
                "id" => 6,
                "product_id" => 2,
                "size" => 80,
                "price" => 60000.0,
                "stock" => 80,
                "buy_price" => 50000.0,
                "created_at" => now(),
                "updated_at" => now()



            ],
            [
                "id" => 7,
                "product_id" => 3,
                "size" => 60,
                "price" => 70000.0,
                "stock" => 70,
                "buy_price" => 60000.0,
                "created_at" => now(),
                "updated_at" => now()



            ],
            [
                "id" => 8,
                "product_id" => 3,
                "size" => 90,
                "price" => 100000.0,
                "stock" => 30,
                "buy_price" => 90000.0,
                "created_at" => now(),
                "updated_at" => now()



            ],
            [
                "id" => 9,
                "product_id" => 3,
                "size" => 100,
                "price" => 90000.0,
                "stock" => 300,
                "buy_price" => 80000.0,
                "created_at" => now(),
                "updated_at" => now()



            ],
            [
                "id" => 10,
                "product_id" => 4,
                "size" => 80,
                "price" => 70000.0,
                "stock" => 30,
                "buy_price" => 60000.0,
                "created_at" => now(),
                "updated_at" => now()



            ],
            [
                "id" => 11,
                "product_id" => 4,
                "size" => 50,
                "price" => 40000.0,
                "stock" => 500,
                "buy_price" => 30000.0,
                "created_at" => now(),
                "updated_at" => now()


            ],
            [
                "id" => 12,
                "product_id" => 4,
                "size" => 60,
                "price" => 60000.0,
                "stock" => 500,
                "buy_price" => 50000.0,
                "created_at" => now(),
                "updated_at" => now()

            ],

        ]);

        $orderF = Order::factory()->count(25)->make();
        $orderF->each->save();

        $userDetailF = OrderDetail::factory()->count(200)->make();
        $userDetailF->each->save();
    }
}
