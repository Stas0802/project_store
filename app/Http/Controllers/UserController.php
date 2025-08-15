<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Show user in table in admin panel
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        $users = User::where('is_admin', false)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('user.index', ['users' => $users]);
    }

    /**
     * Show form for create new user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('create', User::class);
        return view('user.create');
    }

    /**
     * Add new user
     * @param StoreUserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(StoreUserRequest $request)
    {
        $this->authorize('create', User::class);
        User::create([
            'name' => $request->user_name,
            'email' => $request->email,
            'password' => $request->password,
            'is_admin' => false,
        ]);
        return redirect()->back()->with(['success' => 'Add user success']);
    }


    /**
     * Show form for edit user
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function edit(User $user)
    {
        return view('user.edit', ['user' => $user]);
    }

    /**
     * Update user
     * @param StoreUserRequest $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StoreUserRequest $request, User $user)
    {
        $this->authorize('update', $user);
        $user->update([
            'name' => $request->user_name,
            'email' => $request->email,
            ]);
        return redirect()->route('user.index')->with(['success' => 'user success update']);
    }

    /**
     * Delete user
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(User $user)
    {
        $this->authorize('delete', $user);
        $user->delete();
        return redirect()->route('user.index')->with(['success' => 'user deleter']);
    }
}
