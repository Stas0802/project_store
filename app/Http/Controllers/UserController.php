<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user.index', ['users' => $users]);
    }

    public function store(Request $request)
    {
        $this->authorize('create', User::class);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'is_admin' => false,
        ]);
        return redirect()->route('user.index');
    }

    public function create(){
        $this->authorize('create', User::class);
        return view('user.create');
    }

    public function edit(User $user){
        return view('user.edit', ['user' => $user]);
    }

    public function update(Request $request, User $user){
        $this->authorize('update', $user);
        $user->update($request->only('name', 'email'));
        return redirect()->route('user.index')->with(['success' => 'user success update']);
    }

    public function destroy(User $user){
        $this->authorize('delete', $user);
        $user->delete();
        return redirect()->route('user.index')->with(['success' => 'user deleter']);
    }
}
