<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Customer;

class CustomerFactory extends Factory
{
    protected $model = Customer::class;

    public function definition(): array
    {
        return [
            'address' => fake()->address(),
            'phone_number' => fake()->unique()->numberBetween(99360000000, 99365999999),
        ];
    }
}
