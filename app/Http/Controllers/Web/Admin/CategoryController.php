<?php

namespace App\Http\Controllers\Web\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $objs = Category::withCount('products')
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.categories.index')->with([
            'objs' => $objs,
        ]);
    }
    public function products($id)
    {
        $category = Category::with('products')
            ->findOrFail($id);

        return view('admin.categories.products')->with([
            'category' => $category,
            'products' => $category->products,
        ]);
    }
    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
        ]);

        $obj = Category::create([
            'name' => $validated['name'],
        ]);

        return to_route('admin.categories.index')
            ->with([
                'obj' => $obj,
                'success' => 'Category added',
            ]);
    }

    public function edit(string $id)
    {
        $obj = Category::where('id', $id)->firstOrFail();

        return view('admin.categories.edit')->with([
            'obj' => $obj,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
        ]);

        $obj = Category::where('id', $id)->firstOrFail();

        $obj->update([
            'name' => $request->name,
        ]);

        return to_route('admin.categories.index')
            ->with('success', __('Category Edited Successfully'));
    }

    public function destroy($id)
    {
        $obj = Category::findOrFail($id);

        $obj->delete();

        return to_route('admin.categories.index')
            ->with(['success', 'Category deleted successfully.']);
    }
}
