<?php

namespace App\Http\Controllers\Web\Client;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    public function index()
    {
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
