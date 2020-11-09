<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

use App\Http\Requests\UserRequest;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
    }

    public function edit(User $user)
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request, $user)
    {

        $user = Auth::user();

        if (Hash::check($request->input('password'), auth()->user()->password)) {
            $userEdit = [];

            if ($request->filled('name')) {
                $userEdit['name'] = $request->input('name');
            }

            if ($request->filled('email')) {
                $userEdit['email'] = $request->input('email');
            }

            $user->update($userEdit);
            return redirect(route('home'))->with('message', __("profile.edited"));
        } else {
            return redirect(route('profile.edit', compact('user')))->with('message', __("profile.error-password"));
        }
    }
}
