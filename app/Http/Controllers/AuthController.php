<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Akun;

class AuthController extends Controller
{
    public function proses(Request $request)
    {
        $credentials = $request->validate([
            'nomor_induk' => ['required'],
            'password' => ['required'],
        ]);

        // modifikasi Auth::attempt supaya pakai 'nomor_induk'
        if (Auth::attempt(['nomor_induk' => $credentials['nomor_induk'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->role == 'admin') {
                return redirect()->route('admDashboard');
            } else {
                return redirect()->route('home');
            }
        }

        return back()->withErrors([
            'nomor_induk' => 'Nomor Induk atau password salah.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nomor_induk' => 'required|string|unique:akun,nomor_induk',
            'password' => 'required|string|min:6',
        ]);

        Akun::create([
            'nama' => $validated['nama'],
            'nomor_induk' => $validated['nomor_induk'],
            'password' => Hash::make($validated['password']),
            'role' => 'user',
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }
}
