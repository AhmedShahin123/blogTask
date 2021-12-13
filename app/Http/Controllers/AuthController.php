<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Arr;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect()->route('admin-dashboard');
        }
        return view('backend.auth');
    }

    public function signUp()
    {
        $roles = Role::where('name', '!=', 'admin')->get();
        return view('backend.signUp', compact('roles'));
    }

    public function login(Request $request)
    {
        $this->validate(
            $request,
            [
                'email' => 'required|email',
                'password' => 'required|min:4'
            ]
        );

        $credentials = $request->only('email', 'password');

        $remember = $request->has('remember_me');

        if (Auth::attempt($credentials, $remember)) {
            return redirect()->route('admin-dashboard');
        }

        return back()->with('auth_error', 'Invalid credentials')->withInput();
    }

    public function postSignUp(Request $request)
    {
      //dd(request()->all());

        $personalData = request()->all();
        $personalData['password'] = bcrypt(request('password'));
        //dd($personalData);
        $user = User::create($personalData);
        $user->assignRole($personalData['role']);

        $credentials = $request->only('email', 'password');

        $remember = $request->has('remember_me');

        if (Auth::attempt($credentials, $remember)) {
            return redirect()->route('admin-dashboard');
        }

        return back()->with('auth_error', 'Invalid credentials')->withInput();
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login-form');
    }
}
