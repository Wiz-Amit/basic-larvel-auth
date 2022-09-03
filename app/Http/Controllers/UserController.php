<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Models\Gender;
use Illuminate\Http\Request;
use Symfony\Component\Intl\Countries;

class UserController extends Controller
{
    public function index()
    {
        $users = User::query()->latest()->paginate();
        return view('users.index', compact('users'));
    }

    public function show(User $user)
    {
        return redirect()->route('users.edit', $user->getKey());
    }

    public function edit(User $user)
    {
        $genders = Gender::all();
        $countries = Countries::getNames();

        return view('users.edit', compact('user', 'genders', 'countries'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->validated());
        session()->flash('success', __('User has been updated'));
        return redirect()->route('users.edit', $user->getKey());
    }

    public function destroy(User $user)
    {
        $user->delete();
        session()->flash('success', __('User has been delete'));
        return redirect()->route('users.index');
    }
}
