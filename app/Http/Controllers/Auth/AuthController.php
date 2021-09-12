<?php

namespace App\Http\Controllers\Auth;

use App\Models\City;
use App\Models\User;
use App\Models\State;
use App\Models\Country;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\RegisterUserRequest;

class AuthController extends Controller
{
    /**
     * Login Process
     *
     * @param LoginUserRequest $request
     * @return void
     */
    public function login(LoginUserRequest $request)
    {
        if (!Auth::attempt($request->validated())) {
            return back()->with('error', __('Invalid login credentials... Please check it again.'));
        }
        return redirect()->route('dashboard');
    }

    /**
     * Register View
     *
     * @return void
     */
    public function registerView()
    {

        return view('register');
    }

    /**
     * Registration Process
     *
     * @param RegisterUserRequest $request
     * @return void
     */
    public function register(RegisterUserRequest $request)
    {
        /** creating user */
        $user = User::create($request->validated());
        Auth::login($user);
        return redirect()->route('dashboard');
    }

    /**
     * Logout Process
     *
     * @return void
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
