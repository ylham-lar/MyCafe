<?php

namespace App\Http\Controllers\Web\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        // Cart session: [product_id => quantity]
        $cart = session('cart', []);

        if (empty($cart)) {
            $products = collect();
        } else {
            $products = Product::whereIn('id', array_keys($cart))->get()->map(function ($product) use ($cart) {
                $product->quantity = $cart[$product->id];
                return $product;
            });
        }

        return view('client.cart.index', compact('products'));
    }

    public function add(Request $request, Product $product)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $cart = session('cart', []);
        $quantity = $request->input('quantity', 1);

        // Eger öňden bar bolsa, täze mukdary goýýarys (goşmaýarys)
        $cart[$product->id] = $quantity;

        session(['cart' => $cart]);

        // AJAX request bolsa JSON return edýäris
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

    // Cart-yň umumy mukdaryny almak (navbar üçin)
    public function getCartCount()
    {
        $cart = session('cart', []);
        return response()->json([
            'count' => array_sum($cart)
        ]);
    }
}
