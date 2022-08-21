<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@udang.com',
            'password' => bcrypt('123456'),
            'is_admin' => 1
        ]);

        $userF = User::factory()->count(20)->make();
        $userF->each->save();
    }
}
