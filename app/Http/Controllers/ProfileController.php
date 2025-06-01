<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    // Menampilkan halaman profil pengguna
    public function show()
    {
        $user = Auth::user();  // Mengambil data pengguna yang sedang login
        return view('profile.show', compact('user'));  // Mengirim data pengguna ke view profile.show
    }

    // Menampilkan form untuk mengedit profil
    public function edit()
    {
        $user = Auth::user(); // Mengambil data pengguna yang sedang login
        return view('profile.edit', compact('user')); // Mengirim data pengguna ke view profile.edit
    }

    // Memperbarui data profil

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'role' => 'nullable|string|max:20',
            'password' => 'nullable|min:6|confirmed',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;

        if ($request->hasFile('profile_picture')) {
            // Hapus gambar lama jika ada
            if ($user->profile_picture) {
                Storage::disk('public')->delete($user->profile_picture);
            }

            // Simpan gambar baru
            $path = $request->file('profile_picture')->store('profile-pictures', 'public');
            $user->profile_picture = $path;
        }

        // Jika password diisi, perbarui password
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save(); // Simpan perubahan ke database

        return redirect()->route('profile.show')->with('success', 'Profil berhasil diperbarui.');
    }

    public function destroy()
    {
        $user = Auth::user();

        // Hapus gambar profil jika ada
        if ($user->profile_picture) {
            Storage::disk('public')->delete($user->profile_picture);
        }

        // Hapus akun pengguna
        $user->delete();
        Auth::logout();

        return redirect('/')->with('success', 'Akun Anda berhasil dihapus.');
    }
}
