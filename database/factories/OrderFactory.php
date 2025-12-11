<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition(): array
    {
        $productIds = Product::inRandomOrder()
            ->limit($this->faker->numberBetween(1, 5))
            ->pluck('id')
            ->toArray();
        return [
            'customer_id' => Customer::inRandomOrder()->value('id') ?? 1,
            'products'    => $productIds,
            'price'       => $this->faker->numberBetween(50, 500),
            'status'      => $this->faker->randomElement(['pending', 'paid', 'canceled']),
        ];
    }
}
