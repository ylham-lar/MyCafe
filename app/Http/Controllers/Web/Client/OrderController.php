<?php

namespace App\Http\Controllers\Web\Client;

use App\Models\Order;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function payment()
    {
        if (!session()->has('customer_id')) {
            return redirect()->route('client.customer.create');
        }

        $customer = Customer::find(session('customer_id'));

        if (!$customer) {
            session()->forget('customer_id');
            return redirect()->route('client.customer.create');
        }

        return view('client.order.payment', compact('customer'));
    }

    public function store(Request $request)
    {
        if (!session()->has('customer_id')) {
            return redirect()->route('client.customer.create');
        }

        $request->validate([
            'payment_method' => 'required|boolean',
        ]);

        $cart = session('cart', []);
        if (empty($cart)) {
            return redirect()->route('client.cart.index')
                ->with('error', 'Your cart is empty!');
        }

        $totalPrice = 0;
        $cartProducts = [];

        foreach ($cart as $productId => $quantity) {
            $product = Product::find($productId);
            if (!$product) continue;

            $cartProducts[] = [
                'id'       => $product->id,
                'name'     => $product->name,
                'price'    => $product->price,
                'quantity' => $quantity,
            ];

            $totalPrice += $product->price * $quantity;
        }

        Order::create([
            'customer_id'    => session('customer_id'),
            'products'       => json_encode($cartProducts),
            'price'          => $totalPrice,
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
