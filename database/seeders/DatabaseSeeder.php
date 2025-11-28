<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Administrator',
            'username' => 'admin',
            'password' => '11022008',
        ]);

        User::factory()
            ->count(10)
            ->create();

        $this->call([
            CategorySeeder::class,
            ProductSeeder::class,
        ]);

        Customer::factory()
            ->count(50)
            ->create();

        Order::factory()
            ->count(20)
            ->create();

        OrderItem::factory()
            ->count(30)
            ->create();

        $this->call([
            FavoriteSeeder::class,
        ]);
    }
}
