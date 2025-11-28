<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\OrderItem;
use App\Models\Order;
use App\Models\Product;

class OrderItemFactory extends Factory
{
    public function definition(): array
    {
        $product = Product::inRandomOrder()->first() ?? Product::first();
        if (!$product) {
            $product = Product::create([
                'category_id' => 1,
                'name' => 'Default Product',
                'price' => 1000,
                'code' => 'PRD-001',
                'description' => 'Default product',
                'discount_percent' => 0,
                'weight' => 0.2,
            ]);
        }
        $order = Order::inRandomOrder()->first();
        if (!$order) {
            $order = Order::factory()->create();
        }

        $quantity = rand(1, 5);
        $price = $product->price;

        return [
            'order_id' => $order->id,
            'product_id' => $product->id,
            'quantity' => $quantity,
            'price' => $price,
            'total' => $price * $quantity,
        ];
    }
}
