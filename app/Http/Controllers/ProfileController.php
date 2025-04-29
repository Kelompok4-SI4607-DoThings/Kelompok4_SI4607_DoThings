<?php

// app/Http/Controllers/ProfileController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    // Menampilkan profil pengguna
    public function show()
    {
        $user = Auth::user(); // Ambil data pengguna yang sedang login
        return view('profile.show', compact('user'));
    }

    // Menampilkan halaman edit profil
    public function edit()
    {
        $user = Auth::user(); // Ambil data pengguna yang sedang login
        return view('profile.edit', compact('user'));
    }

    // Memperbarui data profil
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
            'phone_number' => 'nullable|string|max:15',
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->save(); // Menggunakan metode save() untuk menyimpan perubahan

        return redirect()->route('profile.show')->with('success', 'Profile updated successfully');
    }

    // Menghapus akun pengguna
    public function destroy()
    {
        $user = Auth::user();
        $user->delete(); // Menggunakan metode delete() untuk menghapus pengguna

        return redirect()->route('home')->with('success', 'Account deleted successfully');
    }
}
