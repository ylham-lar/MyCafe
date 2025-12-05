<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $objs = Product::with('category')
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.products.index')->with([
            'objs' => $objs,
        ]);
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('admin.products.create')->with([
            'categories' => $categories,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id'      => ['nullable', 'exists:categories,id'],
            'name'             => ['required', 'string', 'max:255'],
            'price'            => ['required', 'numeric', 'min:0'],
            'code'             => ['required', 'string', 'max:255', 'unique:products,code'],
            'description'      => ['nullable', 'string'],
            'image'            => ['nullable', 'image', 'max:2048'],
            'discount_percent' => ['nullable', 'integer', 'min:0', 'max:100'],
            'weight'           => ['nullable', 'numeric', 'min:0'],
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        Product::create([
            'category_id'      => $request->category_id,
            'name'             => $request->name,
            'price'            => $request->price,
            'code'             => $request->code,
            'description'      => $request->description,
            'image'            => $imagePath,
            'discount_percent' => $request->discount_percent ?? 0,
            'weight'           => $request->weight ?? 0,
        ]);

        return to_route('admin.products.index')->with([
            'success' => 'Product created successfully.',
        ]);
    }

    public function edit($id)
    {
        $obj = Product::findOrFail($id);
        $categories = Category::orderBy('name')->get();

        return view('admin.products.edit')->with([
            'obj'         => $obj,
            'categories'  => $categories,
        ]);
    }

    public function update(Request $request, $id)
    {
        $obj = Product::findOrFail($id);

        $request->validate([
            'category_id'      => ['nullable', 'exists:categories,id'],
            'name'             => ['required', 'string', 'max:255'],
            'price'            => ['required', 'numeric', 'min:0'],
            'code'             => ['required', 'string', 'max:255', 'unique:products,code,' . $obj->id],
            'description'      => ['nullable', 'string'],
            'image'            => ['nullable', 'image', 'max:2048'],
            'discount_percent' => ['nullable', 'integer', 'min:0', 'max:100'],
            'weight'           => ['nullable', 'numeric', 'min:0'],
        ]);

        $imagePath = $obj->image;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        $obj->update([
            'category_id'      => $request->category_id,
            'name'             => $request->name,
            'price'            => $request->price,
            'code'             => $request->code,
            'description'      => $request->description,
            'image'            => $imagePath,
            'discount_percent' => $request->discount_percent ?? 0,
            'weight'           => $request->weight ?? 0,
        ]);

        return to_route('admin.products.index')->with([
            'success' => 'Product updated successfully.',
        ]);
    }

    public function destroy($id)
    {
        $obj = Product::findOrFail($id);

        if ($obj->image && file_exists(public_path('storage/' . $obj->image))) {
            unlink(public_path('storage/' . $obj->image));
        }

        $obj->delete();

        return to_route('admin.products.index')->with([
            'success' => 'Product deleted successfully.',
        ]);
    }
}
