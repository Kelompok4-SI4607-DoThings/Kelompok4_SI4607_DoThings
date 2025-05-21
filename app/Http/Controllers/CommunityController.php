<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Community;
use Illuminate\Support\Facades\Auth;

class CommunityController extends Controller
{
    // Menampilkan semua komunitas
    public function index()
    {
        $communities = Community::all();
        return view('communities.index', compact('communities'));
    }

    // Menampilkan form tambah komunitas
    public function create()
    {
        return view('communities.create');
    }

    // Menyimpan komunitas baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Community::create([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => Auth::id(), // Pemilik komunitas
        ]);

        return redirect()->route('communities.index')->with('success', 'Komunitas berhasil dibuat.');
    }

    // Menghapus komunitas
    public function destroy($id)
    {
        $community = Community::findOrFail($id);

        // Hanya pemilik yang boleh menghapus
        if ($community->user_id !== Auth::id()) {
            return redirect()->route('communities.index')->with('error', 'Anda tidak memiliki izin.');
        }

        $community->delete();

        return redirect()->route('communities.index')->with('success', 'Komunitas berhasil dihapus.');
    }
}