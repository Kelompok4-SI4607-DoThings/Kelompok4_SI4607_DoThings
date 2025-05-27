<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;

class GalangDanaController extends Controller
{
    public function index()
    {
        // Ambil semua kampanye yang dibuat oleh pengguna
        $campaigns = Campaign::all();

        // Tampilkan view dengan data kampanye
        return view('user.GalangDana.index', compact('campaigns'));
    }

    public function create()
    {
        return view('campaigns.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'target_amount' => 'required|numeric|min:1',
            'deadline' => 'required|date|after:today',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imagePath = $request->file('image')->store('campaign_images', 'public');

        Campaign::create([
            'title' => $request->title,
            'description' => $request->description,
            'target_amount' => $request->target_amount,
            'deadline' => $request->deadline,
            'image' => $imagePath,
            'status' => 'pending', // Default status
        ]);

        return redirect()->route('GalangDana.index')->with('success', 'Kampanye berhasil diajukan dan menunggu verifikasi.');
    }
}