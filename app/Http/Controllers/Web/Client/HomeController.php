<?php

namespace App\Http\Controllers\Web\Client;

use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (!session()->has('customer_id')) {
            return redirect()->route('client.customer.create');
        }

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
