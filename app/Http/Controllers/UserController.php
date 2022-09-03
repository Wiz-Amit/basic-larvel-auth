<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Gender;
use Symfony\Component\Intl\Countries;
use App\Http\Requests\UpdateUserRequest;

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
        try {
            $user->update($request->validated());
            session()->flash('success', __('User has been updated'));
        } catch (\Throwable $th) {
            session()->flash('error', __($th->getMessage()));
        }

        return redirect()->route('users.edit', $user->getKey());
    }

    public function destroy(User $user)
    {
        try {
            // throw new \Exception("Error Processing Request", 1);

            $user->delete();
            session()->flash('success', __('User has been delete'));
        } catch (\Throwable $th) {
            session()->flash('error', __($th->getMessage()));
        }
        return redirect()->route('users.index');
    }
}
