<?php

namespace App\Http\Controllers\Web\Client;

use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get();

        return view('client.home.index', [
            'categories' => $categories
        ]);
    }
    public function products($id)
    {
        $categories = Category::with('products')->findOrFail($id);

        return view('client.category.product', [
            'categories' => $categories,

        ]);
    }
}
