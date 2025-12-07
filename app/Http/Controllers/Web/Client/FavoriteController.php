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
        $favorites = Favorite::with('product')
            ->get();

        return view('client.favorites.index', compact('favorites'));
    }

    public function toggle($product_id)
    {
        $favorite = Favorite::where('product_id', $product_id)
            ->first();

        if ($favorite) {
            $favorite->delete();

            return redirect()->back()
                ->with('success', 'Removed from favorites');
        }

        Favorite::create([
            'product_id' => $product_id
        ]);

        return redirect()->back()
            ->with('success', 'Added to favorites');
    }

    public function destroy($id)
    {
        $favorite = Favorite::where('id', $id)
            ->first();

        if ($favorite) {
            $favorite->delete();
            return redirect()->back()
                ->with('success', 'Removed from favorites');
        }

        return redirect()->back()
            ->with('error', 'Favorite not found');
    }

    public function destroyAll()
    {
        Favorite::query()->delete();

        return redirect()->back()
            ->with('success', 'All favorites cleared');
    }
}
