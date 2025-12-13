<?php

namespace App\Http\Controllers\Web\Client;

use App\Models\Order;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function payment(Customer $customer)
    {
        return view('client.order.payment', ['customer' => $customer]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'payment_method' => 'required|boolean',
        ]);

        $customer_id = $request->customer_id;
        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect()->route('client.cart.index')->with('error', 'Your cart is empty!');
        }

        $cartProducts = [];
        $totalPrice = 0;

        foreach ($cart as $productId => $quantity) {
            $product = Product::find($productId);
            if (!$product) continue;

            $cartProducts[] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $quantity,
            ];

            $totalPrice += $product->price * $quantity;
        }

        $productsJson = json_encode($cartProducts, JSON_UNESCAPED_UNICODE);

        $order = Order::create([
            'customer_id' => $customer_id,
            'products' => $productsJson,
            'price' => $totalPrice,
            'payment_method' => $request->payment_method,
        ]);

        session()->forget('cart');

        return redirect()->route('client.order.success');
    }


    public function success()
    {
        return view('client.order.success');
    }
}
