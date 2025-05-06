<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $validated = request()->validate([
            'username' => 'required|min:3|max:40',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);

        $user = User::create([
            'n_penuh' => $request->fullname,
            'username' => $validated['username'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'tel' => '',
            'role' => '',
            'stat' => 1,
            'sessionID' => '',
            'isPrismakhas' => 0,
            'client_id' => 0
        ]);

        // Mail::to($user->email)
        //     ->send(new WelcomeEmail($user));
        Session::flash('toastr', ['type' => 'success', 'message' => 'Account created successfully, Please contact Admin for verification!']);
        return redirect()->route('login');
    }

    public function login()
    {
        return view('login');
    }

    public function authenticate()
    {
        $validated = request()->validate([
            'username' => 'required',
            'password' => 'required|min:8'
        ]);

        if (auth()->attempt($validated)) {
            request()->session()->regenerate();

            session([
                'id' => Auth::user()->id,
                'username' => Auth::user()->username,
                'n_penuh' => Auth::user()->n_penuh,
                'role' => Auth::user()->role_id
            ]);
            Session::flash('toastr', ['type' => 'success', 'message' => 'Login Successfully']);
            return redirect()->route('dashboard');
        } else {
            Session::flash('toastr', ['type' => 'error', 'message' => 'Wrong username or password']);
            return redirect()->route('login');
        }
    }

    public function forgotPassword()
    {
        return view('forgotpassword');
    }

    public function update(Request $request)
    {
        $user = User::where('email', $request->email)->firstOrFail();

        $data = array(
            'password' => Hash::make($request->password)
        );

        $user->update($data);
        Session::flash('toastr', ['type' => 'success', 'message' => 'Password updated successfully!']);
        return redirect()->route('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'Logged out successfully');
    }
}
