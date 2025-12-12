<?php

namespace App\Http\Controllers\Web\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session('cart', []);
        $products = collect();

        if (!empty($cart)) {
            $products = Product::whereIn('id', array_keys($cart))->get()->map(function ($product) use ($cart) {
                // Quantity-ni integer edip alýarys
                $product->quantity = intval($cart[$product->id]['quantity'] ?? 1);
                $product->price = floatval($product->price);
                return $product;
            });
        }

        return view('client.cart.index')->with([
            'products' => $products,
        ]);
    }


    public function add(Request $request, Product $product)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $cart = session('cart', []);
        $quantity = $request->input('quantity', 1);

        $cart[$product->id] = $quantity;

        session(['cart' => $cart]);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Cart updated successfully',
                'cart_count' => array_sum($cart)
            ]);
        }

        return back()->with('success', 'Cart updated successfully');
    }

    public function remove(Product $product)
    {
        $cart = session('cart', []);
        unset($cart[$product->id]);
        session(['cart' => $cart]);

        return back()->with('success', 'Product removed from cart');
    }
    public function clearCart()
    {
        session()->forget('cart');

        return redirect()->route('client.cart.index')->with('success', 'Cart Clened');
    }

    public function getCartCount()
    {
        $cart = session('cart', []);
        return response()->json([
            'count' => array_sum($cart)
        ]);
    }
}
