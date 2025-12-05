<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Favorite;
use App\Models\Customer;
use App\Models\Product;

class FavoriteSeeder extends Seeder
{
    public function run(): void
    {
        $customers = Customer::get();
        $products = Product::get();

        foreach ($customers as $customer) {
            $favoriteProducts = $products->random(min(5, $products->count()));
            foreach ($favoriteProducts as $product) {
                Favorite::firstOrCreate([
                    'customer_id' => $customer->id,
                    'product_id' => $product->id,
                ]);
            }
        }
    }
}
