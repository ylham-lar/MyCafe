<?php

namespace App\Http\Controllers\Web\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $category_id = $request->query('category_id');

        $products = Product::when($category_id, function ($query, $category_id) {
            return $query->where('category_id', $category_id);
        })->orderBy('id', 'desc')->get();

        $categories = Category::orderBy('name')->get();

        return view('client.product.index', [
            'products' => $products,
            'categories' => $categories,
            'selectedCategory' => $category_id
        ]);
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('client.product.show', [
            'product' => $product
        ]);
    }
}
