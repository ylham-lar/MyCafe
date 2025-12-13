<?php

namespace App\Http\Controllers\Web\Admin;

use App\Models\Order;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        $objs = Order::with('customer')
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.orders.index')->with([
            'objs' => $objs,
        ]);
    }

    public function create()
    {
        $customers = Customer::get();
        $products = Product::get();

        return view('admin.orders.create')->with([
            'customers' => $customers,
            'products' => $products,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => ['required', 'exists:customers,id'],
            'products' => ['required', 'array', 'min:1'],
            'products.*' => ['exists:products,id'],
            'quantities' => ['required', 'array'],
            'quantities.*' => ['integer', 'min:1'],
            'payment_method' => ['required', 'in:0,1'],
        ]);

        $productsData = [];
        $totalPrice = 0;

        foreach ($request->products as $productId) {
            $product = Product::find($productId);
            if ($product) {
                $quantity = $request->quantities[$productId] ?? 1;
                $discount = $product->discount_percent ?? 0;
                $finalPrice = $discount > 0 ? $product->price * (1 - $discount / 100) : $product->price;

                $productsData[] = [
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'discount_percent' => $discount,
                    'quantity' => $quantity
                ];

                $totalPrice += $finalPrice * $quantity;
            }
        }

        Order::create([
            'customer_id' => $request->customer_id,
            'products' => json_encode($productsData),
            'price' => round($totalPrice),
            'payment_method' => $request->payment_method,
        ]);

        return to_route('admin.orders.index')
            ->with('success', 'Order created successfully.');
    }
    public function edit($id)
    {
        $obj = Order::findOrFail($id);
        $customers = Customer::orderBy('phone_number')->get();
        $products = Product::get();

        return view('admin.orders.edit')->with([
            'obj' => $obj,
            'customers' => $customers,
            'products' => $products,
        ]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'customer_id' => ['required', 'exists:customers,id'],
            'products' => ['required', 'array', 'min:1'],
            'products.*' => ['exists:products,id'],
            'quantities' => ['required', 'array'],
            'quantities.*' => ['integer', 'min:1'],
            'payment_method' => ['required', 'in:0,1'],
        ]);

        $obj = Order::findOrFail($id);

        $productsData = [];
        $totalPrice = 0;

        foreach ($request->products as $productId) {
            $product = Product::find($productId);
            if ($product) {
                $quantity = $request->quantities[$productId] ?? 1;
                $discount = $product->discount_percent ?? 0;
                $finalPrice = $discount > 0 ? $product->price * (1 - $discount / 100) : $product->price;

                $productsData[] = [
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'discount_percent' => $discount,
                    'quantity' => $quantity
                ];

                $totalPrice += $finalPrice * $quantity;
            }
        }

        $obj->update([
            'customer_id' => $request->customer_id,
            'products' => json_encode($productsData),
            'price' => round($totalPrice),
            'payment_method' => $request->payment_method,
        ]);

        return to_route('admin.orders.index')
            ->with('success', 'Order updated successfully.');
    }





    public function destroy($id)
    {
        $obj = Order::findOrFail($id);
        $obj->delete();

        return to_route('admin.orders.index')
            ->with('success', 'Order deleted successfully.');
    }
}
