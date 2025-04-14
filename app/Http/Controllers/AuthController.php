<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Tampilkan halaman login
    public function showLoginForm()
    {
        return view('auth.login');
    }
    // Proses login
    public function login(Request $request)
    {
        // Validasi data input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
      
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            // Redirect otomatis sesuai role
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }
            return redirect()->route('user.dashboard');
        }
      
        return back()->withErrors(['email' => 'Email atau password salah.']);
    }

    // Tampilkan halaman register
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Proses registrasi
    public function register(Request $request)
    {
        // Validasi data input
        $request->validate([
            'name'                  => 'required',
            'email'                 => 'required|email|unique:users',
            'password'              => 'required|min:6|confirmed',
        ]);
      
        // Buat user baru, default role: user
        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'user',
        ]);
      
        return redirect()->route('login')->with('success', 'Registrasi berhasil, silakan login.');
    }

    // Proses logout
    public function logout(Request $request)
    {
        Auth::logout();
      
        $request->session()->invalidate();
        $request->session()->regenerateToken();
      
        return redirect('/');
    }
}
