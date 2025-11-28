<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Order;
use App\Models\Customer;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition(): array
    {
        $subtotal = fake()->numberBetween(1000, 50000);
        $discount = fake()->numberBetween(0, 5000);

        return [
            'customer_id' => Customer::inRandomOrder()->first()->id,
            'subtotal' => $subtotal,
            'total_price' => $subtotal - $discount,
            'status' => fake()->numberBetween(0, 2),
        ];
    }
}
