<?php

namespace App\Http\Controllers\Web\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        return view('client.home.index');
    }

    public function card()
    {
        $cart = session('cart', []);
        return view('client.cart.index', compact('cart'));
    }

    public function locale($locale)
    {
        $locale = in_array($locale, ['tm', 'ru']) ? $locale : 'en';
        session()->put('locale', $locale);

        return redirect()->back();
    }
}
