<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::query()->latest()->paginate();
        return view('users.index', compact('users'));
    }

    public function edit(User $user)
    {
        dd($user);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(User $user)
    {
        $user->delete();
        session()->flash(__('User has been delete'));
        return redirect()->route('users.index');
    }
}
