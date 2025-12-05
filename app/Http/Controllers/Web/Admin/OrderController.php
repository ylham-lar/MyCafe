<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Customer;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $objs = Order::with('customer')
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.orders.index')->with([
            'objs' => $objs,
        ]);
    }

    public function create()
    {
        $customers = Customer::orderBy('first_name')->get();

        return view('admin.orders.create')->with([
            'customers' => $customers,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => ['required', 'exists:customers,id'],
            'price'       => ['required', 'numeric', 'min:1'],
            'status'      => ['required', 'in:pending,paid,canceled'],
        ]);

        Order::create([
            'customer_id' => $request->customer_id,
            'price'       => $request->price,
            'status'      => $request->status,
        ]);

        return to_route('admin.orders.index')
            ->with('success', 'Order created successfully.');
    }

    public function edit($id)
    {
        $obj = Order::findOrFail($id);
        $customers = Customer::orderBy('first_name')->get();

        return view('admin.orders.edit')->with([
            'obj'       => $obj,
            'customers' => $customers,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'customer_id' => ['required', 'exists:customers,id'],
            'price'       => ['required', 'numeric', 'min:1'],
            'status'      => ['required', 'in:pending,paid,canceled'],
        ]);

        $obj = Order::findOrFail($id);

        $obj->update([
            'customer_id' => $request->customer_id,
            'price'       => $request->price,
            'status'      => $request->status,
        ]);

        return to_route('admin.orders.index')
            ->with('success', 'Order updated successfully.');
    }

    public function destroy($id)
    {
        $obj = Order::findOrFail($id);
        $obj->delete();

        return to_route('admin.orders.index')
            ->with('success', 'Order deleted successfully.');
    }
}
