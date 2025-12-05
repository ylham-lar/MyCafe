<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index()
    {
        $objs = Favorite::with(['customer', 'product.category'])
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.favorites.index', compact('objs'));
    }

    public function destroy($id)
    {
        $obj = Favorite::findOrFail($id);
        $obj->delete();

        return to_route('admin.favorites.index')
            ->with('success', 'Favorite deleted successfully.');
    }
}
