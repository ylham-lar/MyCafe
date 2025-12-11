<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    public function definition()
    {
        return [
            'customer_id'    => Customer::inRandomOrder()->value('id') ?? 1,
            'products'       => json_encode([1, 2, 3]), 
            'price'          => $this->faker->numberBetween(20, 500),
            'payment_method' => $this->faker->boolean(),
            'status'         => $this->faker->randomElement(['pending', 'paid', 'canceled']),
        ];
    }
}
