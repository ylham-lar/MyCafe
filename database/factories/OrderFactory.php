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
        return [
            'customer_id' => Customer::inRandomOrder()->value('id') ?? 1,
            'price'       => $this->faker->numberBetween(10, 300),
            'status'      => $this->faker->randomElement(['pending', 'paid', 'canceled']),
        ];
    }
}
