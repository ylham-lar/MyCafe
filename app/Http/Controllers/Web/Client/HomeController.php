<?php

namespace App\Http\Controllers\Web\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')
            ->with('products')
            ->get();
        $products = Product::orderBy('id', 'desc')->get();

        return view('client.home.index', [
            'categories' => $categories,
            'products' => $products
        ]);
    }
    public function locale($locale)
    {
        $locale = in_array($locale, ['tm', 'ru']) ? $locale : 'en';
        session()->put('locale', $locale);

        return redirect()->back();
    }
}
