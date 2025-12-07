<?php

namespace Database\Factories;

use App\Models\Favorite;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class FavoriteFactory extends Factory
{
    protected $model = Favorite::class;

    public function definition()
    {
        return [
            'customer_id' => Customer::inRandomOrder()->first()->id,
            'product_id'  => Product::inRandomOrder()->first()->id,
        ];
    }
}
