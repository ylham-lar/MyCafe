<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserAgent;
use Illuminate\Http\Request;

class UserAgentController extends Controller
{
    public function index()
    {
        $objs = UserAgent::orderBy('id')
            ->get();

        return view('admin.useragents.index')->with([
            'objs' => $objs,
        ]);
    }
}
