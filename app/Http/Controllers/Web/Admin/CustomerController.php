<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $objs = Customer::orderBy('id', 'desc')->get();

        return view('admin.customers.index')->with([
            'objs' => $objs,
        ]);
    }

    public function create()
    {
        return view('admin.customers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'address'       => ['required', 'string', 'max:255'],
            'phone_number'  => ['nullable', 'string', 'max:255'],
        ]);

        Customer::create([
            'address'       => $request->address,
            'phone_number'  => $request->phone_number,
        ]);

        return to_route('admin.customers.index')->with([
            'success' => 'Saved successfully.',
        ]);
    }

    public function edit($id)
    {
        $obj = Customer::findOrFail($id);

        return view('admin.customers.edit')->with([
            'obj' => $obj,
        ]);
    }

    public function update(Request $request, $id)
    {
        $obj = Customer::findOrFail($id);

        $request->validate([
            'address'       => ['required', 'string', 'max:255'],
            'phone_number'  => ['nullable', 'string', 'max:255'],
        ]);

        $obj->update([
            'address'       => $request->address,
            'phone_number'  => $request->phone_number,
        ]);

        return to_route('admin.customers.index')->with([
            'success' => 'Updated successfully.',
        ]);
    }

    public function destroy($id)
    {
        $obj = Customer::findOrFail($id);
        $obj->delete();

        return to_route('admin.customers.index')->with([
            'success' => 'Deleted successfully.',
        ]);
    }
}
