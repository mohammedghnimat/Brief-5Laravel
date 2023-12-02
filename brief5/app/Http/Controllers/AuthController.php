<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->only([
            'register', 'login1'
        ]);
    }
    public function register()
    {
        return view('auth.signup');
    }
    public function sign_up(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:8',
            'role_id' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id

        ]);


        $request->session()->start();

        $userId = Auth::user()->id;
        $roleId = Auth::user()->role_id;

        $request->session()->put('userId', $userId);
        $request->session()->put('roleId', $roleId);

        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        $request->session()->regenerate();

        return redirect()->route('properties.index');
    }

    public function login1()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        if (Auth::attempt($credentials)) {
            // Authentication successful
            $request->session()->start();

            $userId = Auth::user()->id;
            $roleId = Auth::user()->role_id;

            $request->session()->put('userId', $userId);
            $request->session()->put('roleId', $roleId);

            $request->session()->regenerate();

            if ($roleId == 1) {
                return  redirect()->route('admin.dashboard.statistics');
                // return redirect()->route('properties');
            } elseif ($roleId == 2) {
                return  redirect()->route('landlord.dashboard.index');
                    // ->withSuccess('You have successfully logged in!')
            } else {
                return redirect()->route('properties.index');
                // return redirect()->route('home');
            }
        } else {
            return back()->withErrors([
                'email' => 'Your provided credentials do not match our records.',
                'password' => 'Please check your password and try again.',
            ])->onlyInput('email');
        }
    }

    public function dash()
    {
        // dd(Auth::user());
        if(Auth::check())
        {
            $roleId = session()->get('roleId');
            if ($roleId == 1) {
                return  redirect()->route('admin.dashboard.statistics');
                // return redirect()->route('properties');
            } elseif ($roleId == 2) {
                return  redirect()->route('landlord.dashboard.index');
                    // ->withSuccess('You have successfully logged in!')
            } else {
                return redirect()->route('user.dashboard');
                // return redirect()->route('home');
            }
        }
        
        return redirect()->route('login')
            ->withErrors([
            'email' => 'Please login to access the dashboard.',
        ])->onlyInput('email');
    } 
    /////////////////////////////
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login1')
            ->withSuccess('You have logged out successfully!');
    }
}
