<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        if (!auth()->user()->can('users.index')) {
            abort(403);
        }

        $users = User::all()->sortDesc();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request) {
        if (!auth()->user()->can('users.create')) {
            abort(403);
        }

        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        $user->save();

        $user->assignRole('user');

        return redirect()->route('users.index')->with('success', 'Usuário criado com sucesso!');
    }

    public function edit($id)
    {
        if (!auth()->user()->can('users.edit')) {
            abort(403);
        }

        $user = User::find($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        if (!auth()->user()->can('users.edit')) {
            abort(403);
        }

        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'nullable',
        ]);

        $user = User::find($id);

        if (!auth()->user()->can('users.edit', $user)) {
            abort(403);
        }

        $user->name = $data['name'];
        $user->email = $data['email'];
        if ($data['password']) {
            $user->password = bcrypt($data['password']);
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'Usuário atualizado com sucesso!');
    }
}
