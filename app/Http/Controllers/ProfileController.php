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
            'role' => 'nullable|string|max:20', // Opsional jika role bisa diedit
            'password' => 'nullable|min:6|confirmed',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk gambar
        ]);

        $user = Auth::user(); // Mengambil data pengguna yang sedang login
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role; // Jika role diubah, diperbarui di sini

        // Jika ada foto profil yang diunggah, simpan di folder 'public/images'
        if ($request->hasFile('profile_picture')) {
            // Hapus gambar lama jika ada
            if ($user->profile_picture && file_exists(public_path('images/' . $user->profile_picture))) {
                unlink(public_path('images/' . $user->profile_picture));
            }

            // Simpan gambar baru
            $file = $request->file('profile_picture');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);

            // Simpan nama file ke database
            $user->profile_picture = $filename;
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
        if ($user->profile_picture && file_exists(public_path('images/' . $user->profile_picture))) {
            unlink(public_path('images/' . $user->profile_picture));
        }

        // Hapus akun pengguna
        $user->delete();

        // Logout pengguna setelah akun dihapus
        Auth::logout();

        return redirect('/')->with('success', 'Akun Anda berhasil dihapus.');
    }
}
