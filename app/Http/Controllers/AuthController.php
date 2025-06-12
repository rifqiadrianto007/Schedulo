<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Akun;

class AuthController extends Controller
{
    public function proses(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->role == 'admin') {
                return redirect()->route('admDashboard');
            } else {
                return redirect()->route('home');
            }
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }
}
