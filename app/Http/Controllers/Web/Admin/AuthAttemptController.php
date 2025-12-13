<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\AuthAttempt;
use Illuminate\Http\Request;

class AuthAttemptController extends Controller
{
    public function index()
    {
        $authAttempts = AuthAttempt::with('ipAddress', 'userAgent')
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.authattempts.index')
            ->with([
                'authAttempts' => $authAttempts,
            ]);
    }
}
