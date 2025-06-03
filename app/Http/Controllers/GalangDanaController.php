<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\FundraisingCategory;
use Illuminate\Http\Request;

class GalangDanaController extends Controller
{
    public function index()
    {
        // Ambil semua kampanye yang dibuat oleh pengguna
        $campaigns = Campaign::all();
        
        // Tambahkan ini untuk mengambil kategori
        $categories = FundraisingCategory::where('status', 'active')->get();

        // Tampilkan view dengan data kampanye dan kategori
        return view('user.GalangDana.index', compact('campaigns', 'categories'));
    }

    public function create()
    {
        $categories = FundraisingCategory::where('status', 'active')->get();
        return view('user.galangDana.create', compact('categories'));
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

    public function edit($id)
    {
        $campaign = Campaign::findOrFail($id);
        $categories = FundraisingCategory::where('status', 'active')->get();
        return view('user.GalangDana.edit', compact('campaign', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $campaign = Campaign::findOrFail($id);
        
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'target_amount' => 'required|numeric|min:1',
            'deadline' => 'required|date|after:today',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'target_amount' => $request->target_amount,
            'deadline' => $request->deadline,
        ];

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('campaign_images', 'public');
            $data['image'] = $imagePath;
        }

        $campaign->update($data);

        return redirect()->route('GalangDana.index')
            ->with('success', 'Kampanye berhasil diperbarui.');
    }
}