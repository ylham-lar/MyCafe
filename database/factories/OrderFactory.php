<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    public function definition()
    {
        $productIds = Product::inRandomOrder()
            ->limit(rand(1, 5))
            ->pluck('id')
            ->toArray();

        $products = [];

        foreach ($productIds as $id) {
            $product = Product::find($id);

            if (!$product) continue;

            $qty = rand(1, 5); 

            $products[] = [
                'id'       => $product->id,
                'name'     => $product->name,
                'price'    => $product->price,
                'quantity' => $qty,
            ];
        }

        $total = collect($products)->sum(fn($p) => $p['price'] * $p['quantity']);

        return [
            'customer_id'    => Customer::inRandomOrder()->value('id') ?? 1,
            'products'       => json_encode($products, JSON_UNESCAPED_UNICODE),
            'price'          => $total,
            'payment_method' => $this->faker->boolean(),
        ];
    }
}
