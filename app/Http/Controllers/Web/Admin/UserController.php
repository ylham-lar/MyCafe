<?php

namespace App\Http\Controllers\Web\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $objs = User::orderBy('id', 'desc')
            ->get();

        return view('admin.user.index')->with([
            'objs' => $objs,
        ]);
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'username' => ['required', 'string', 'max:100', 'unique:users,username'],
            'password' => ['required', 'string', 'min:8', 'max:50'],
        ]);

        $obj = User::create([
            'name' => $validated['name'],
            'username' => $validated['username'],
            'password' => Hash::make($validated['password']),
        ]);

        return to_route('admin.users.index')
            ->with([
                'obj' => $obj,
                'success' => 'User added',
            ]);
    }

    public function edit(string $id)
    {
        $obj = User::where('id', $id)->firstOrFail();

        return view('admin.user.edit')->with([
            'obj' => $obj,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'username' => ['required', 'string', 'max:100', 'unique:users,username,' . $id],
            'password' => ['nullable', 'string', 'min:8', 'max:50'],
        ]);

        $obj = User::where('id', $id)->firstOrFail();

        $obj->update([
            'name' => $request->name,
            'username' => $request->username,
            'password' => $request->password ? Hash::make($request->password) : $obj->password,
        ]);

        return to_route('admin.users.index')
            ->with('success', __('User Edited Successfully'));
    }

    public function destroy($id)
    {
        $obj = User::findOrFail($id);
        $obj->delete();

        return to_route('admin.users.index')
            ->with([
                'success' => 'User deleted',
            ]);
    }
}
