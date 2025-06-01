<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class CampaignController extends Controller
{
    public function index()
    {
        $campaigns = Campaign::latest()->get();
        return view('admin.campaigns.index', compact('campaigns'));
    }
    public function create()
    {
        return view('admin.campaigns.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'target_amount' => 'required|numeric',
            'deadline' => 'required|date',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // Simpan gambar ke storage
        $path = $request->file('image')->store('campaigns', 'public');

        Campaign::create([
            'title' => $request->title,
            'description' => $request->description,
            'target_amount' => $request->target_amount,
            'current_amount' => 0,
            'deadline' => $request->deadline,
            'image' => $path // Simpan path relatif ke storage
        ]);

        return redirect()->route('campaigns.index')->with('success', 'Campaign created successfully.');
    }

    public function show($id)
    {
        try {
            $campaign = Campaign::with('donations')->findOrFail($id);
            return view('admin.campaigns.show', compact('campaign'));
        } catch (\Exception $e) {
            Log::error('Campaign show error: ' . $e->getMessage());
            return redirect()->route('campaigns.index')
                ->with('error', 'Kampanye tidak ditemukan');
        }
    }

    public function edit($id)
    {
        $campaign = Campaign::findOrFail($id);
        return view('admin.campaigns.edit', compact('campaign'));
    }
    
    public function update(Request $request, $id)
    {
        $campaign = Campaign::findOrFail($id);
        
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'target_amount' => 'required|numeric',
            'deadline' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);
    
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'target_amount' => $request->target_amount,
            'deadline' => $request->deadline,
        ];

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($campaign->image && Storage::disk('public')->exists($campaign->image)) {
                Storage::disk('public')->delete($campaign->image);
            }
            
            // Upload gambar baru
            $path = $request->file('image')->store('campaigns', 'public');
            $data['image'] = $path;
        }

        $campaign->update($data);
        return redirect()->route('campaigns.show', $campaign->id)
            ->with('success', 'Kampanye berhasil diperbarui.');
    }
    
    public function destroy($id)
    {
        $campaign = Campaign::findOrFail($id);
        
        // Hapus gambar dari storage jika ada
        if ($campaign->image && Storage::disk('public')->exists($campaign->image)) {
            Storage::disk('public')->delete($campaign->image);
        }
        
        // Hapus campaign dan semua donasi terkait
        $campaign->delete();
        
        return redirect()->route('campaigns.index')
            ->with('success', 'Kampanye berhasil dihapus.');
    }
    
    public function donors($id)
    {
        $campaign = Campaign::with('donations')->findOrFail($id);
        return view('admin.campaigns.donors', compact('campaign'));
    }
}