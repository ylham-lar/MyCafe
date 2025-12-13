<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;

use App\Models\IpAddress;
use Illuminate\Http\Request;

class IpAddresController extends Controller
{
    public function index()
    {
        $ip_Addresses = IpAddress::orderBy('id')
            ->get();

        return view('admin.ipAddresses.index')->with([
            'ip_Addresses' => $ip_Addresses,
        ]);
    }
}
