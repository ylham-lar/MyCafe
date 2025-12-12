<?php

namespace App\Http\Controllers\Web\Client;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function create()
    {
        return view('client.customer.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
        ]);

        $customer = Customer::create([
            'address' => $request->address,
            'phone_number' => $request->phone_number,
        ]);

        session(['customer_id' => $customer->id]);

        return redirect()->route('client.order.payment', $customer->id);
    }
}
