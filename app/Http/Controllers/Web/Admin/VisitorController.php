<?php

namespace App\Http\Controllers\Web\admin;

use App\Http\Controllers\Controller;
use App\Models\Visitor;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'ip_address' => ['nullable', 'integer', 'min:1'],
            'user_agent' => ['nullable', 'integer', 'min:1'],
            'visitor' => ['nullable', 'integer', 'min:1'],
        ]);
        $filter_ip_address = $request->has('ip_address') ? $request->ip_address : null;
        $filter_user_agent = $request->has('user_agent') ? $request->user_agent : null;
        $filter_visitor = $request->has('visitor') ? $request->visitor : null;

        $objs = Visitor::when(isset($filter_ip_address), fn($query) => $query->where('ip_address_id', $filter_ip_address))
            ->when(isset($filter_user_agent), fn($query) => $query->where('user_agent_id', $filter_user_agent))
            ->when(isset($filter_visitor), fn($query) => $query->where(' id', $filter_visitor))
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.visitor.index')->with([
            'objs' => $objs,
        ]);
    }
}
