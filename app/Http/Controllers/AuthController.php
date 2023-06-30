<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function create(Request $request)
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $validated = request()->validate([
            'name' => ['required', 'min:3', 'max:255'],
            'user_name' => ['required', Rule::unique('users', 'user_name')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|min:8'
        ]);
        $user = User::create([
            'name' => $validated['name'],
            'user_name' => $validated['user_name'],
            'email' => $validated['email'],
            'password' => $validated['password']
        ]);

        //login
        auth()->login($user);
        return redirect('/')->with('success', 'Welcome Dear, ' . $user->name);
        return response()->json(request()->all());
    }

    //login page
    public function login()
    {
        return view('auth.login');
    }

    //post login
    public function post_login(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'email', Rule::exists('users', 'email')],
            'password' => ['required']
        ]);
        if (auth()->attempt($validated)) {
            if (auth()->user()->is_admin) {
                return redirect('/admin/blogs')->with('success', 'Welcome Back Admin, ' . auth()->user()->name);
            } else {
                return redirect('/')->with('success', 'Welcome Back Dear, ' . auth()->user()->name);
            }
        } else {
            return redirect()->back()->withErrors([
                'email' => 'User credentials Wrong.'
            ]);
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/')->with('success', 'Bye');
    }
}
