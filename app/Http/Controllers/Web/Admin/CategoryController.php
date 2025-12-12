<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $objs = Category::orderBy('id', 'desc')->get();

        return view('admin.categories.index')->with([
            'objs' => $objs
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
        $request->validate([
            'name'    => 'required|string|max:255',
            'name_ru' => 'nullable|string|max:255',
            'name_tm' => 'nullable|string|max:255',
        ]);

        Category::create([
            'name'    => $request->name,
            'name_ru' => $request->name_ru,
            'name_tm' => $request->name_tm,
        ]);

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Category created successfully.');
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
            'name'    => 'required|string|max:255',
            'name_ru' => 'nullable|string|max:255',
            'name_tm' => 'nullable|string|max:255',
        ]);

        $obj = Category::where('id', $id)->firstOrFail();

        $obj->update([
            'name'    => $request->name,
            'name_ru' => $request->name_ru,
            'name_tm' => $request->name_tm,
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
