<?php

namespace App\Http\Controllers\Web\Client;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    public function index()
    {
        if (!session()->has('customer_id')) {
            return redirect()->route('client.customer.create');
        }

        $categories = Category::orderBy('id', 'desc')
            ->with('products')
            ->get();
        $products = Product::orderBy('id', 'desc')->get();

        return view('client.menu.index', [
            'categories' => $categories,
            'products' => $products
        ]);
    }
}
