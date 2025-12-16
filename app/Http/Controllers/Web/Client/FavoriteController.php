<?php

namespace App\Http\Controllers\Web\Client;

use App\Models\Product;
use App\Models\Favorite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index()
    {
        if (!session()->has('customer_id')) {
            return redirect()->route('client.customer.create');
        }

        $favorites = Favorite::with('product')->get();

        return view('client.favorites.index')->with([
            'favorites' => $favorites,
        ]);
    }

    public function toggle(Product $product)
    {
        $customerId = session('customer_id');

        if (!$customerId) {
            return redirect()->route('client.customer.create');
        }

        $favorite = Favorite::where('customer_id', $customerId)
            ->where('product_id', $product->id)
            ->first();

        if ($favorite) {
            $favorite->delete();
            return back();
        }

        Favorite::create([
            'customer_id' => $customerId,
            'product_id' => $product->id,
        ]);

        return back();
    }




    public function destroy($id)
    {
        Favorite::destroy($id);

        return back()->with('success', 'Removed');
    }

    public function destroyAll()
    {
        Favorite::query()->delete();

        return back()->with('success', 'All removed');
    }
}
