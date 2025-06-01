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
      
        // Cek apakah login sebagai admin
        if ($credentials['email'] === 'ADMIN123@gmail.com' && $credentials['password'] === 'ADMIN321') {
            $admin = User::where('email', 'ADMIN123@gmail.com')->first();
        
            if (!$admin) {
                $admin = User::create([
                    'name' => 'Super Admin',
                    'email' => 'ADMIN123@gmail.com',
                    'password' => bcrypt('ADMIN321'),
                    'role' => 'admin',
                ]);
            } else {
                // Pastikan role-nya tetap admin
                $admin->update([
                    'role' => 'admin',
                    'password' => bcrypt('ADMIN321'), // Optional: reset password saat login
                ]);
            }
        
            Auth::login($admin);
            return redirect()->route('admin.dashboard');
        }

        // Proses login user biasa
        // Cek apakah login sebagai admin
        if ($credentials['email'] === 'ADMIN123@gmail.com' && $credentials['password'] === 'ADMIN321') {
            $admin = User::firstOrCreate(
                ['email' => 'ADMIN123@gmail.com'],
                [
                    'name' => 'Super Admin',
                    'password' => bcrypt('ADMIN321'),
                    'role' => 'admin',
                ]
            );

            Auth::login($admin);
            return redirect()->route('admin.dashboard');
        }

        // Proses login user biasa
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Jika yang login adalah admin, logout dan berikan pesan kesalahan
            if (Auth::user()->role === 'admin') {
                Auth::logout();
                return back()->withErrors([
                    'email' => 'Invalid login credentials.',
                ]);
            }

            return redirect()->route('user.dashboard');
        }

        // Jika gagal login
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
        $request->validate([
            'name'                  => 'required',
            'email'                 => 'required|email|unique:users',
            'password'              => 'required|min:6|confirmed',
        ]);

        // Buat user baru dengan role default 'user'
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
        return redirect('/login');
    }
}
