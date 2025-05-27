<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;

class GalangDanaAdminController extends Controller
{
    public function index()
    {
        $campaigns = Campaign::all(); // tampilkan semua status

        // Tampilkan view dengan data kampanye
        return view('admin.galangDanaAdmin.index', compact('campaigns'));
    }

    public function show($id)
    {
        $campaign = Campaign::findOrFail($id);
        return view('admin.galangDanaAdmin.show', compact('campaign'));
    }

    public function update(Request $request, $id)
    {
        
        $request->validate([
            'status' => 'required|in:approved,rejected',
            'suggestions' => 'nullable|string',
        ]);

        // Cari kampanye berdasarkan ID
        $campaign = Campaign::findOrFail($id);

        // Perbarui status dan saran
        $campaign->update([
            'status' => $request->status,
            'suggestions' => $request->suggestions,
        ]);
        // Jika statusnya approved, lakukan tindakan tambahan jika diperlukan
        return redirect()->route('galangDanaAdmin.index')->with('success', 'Kampanye berhasil diperbarui.');
    }

    public function destroy($id)
    {
    $campaign = Campaign::findOrFail($id);
    $campaign->delete();

    return redirect()->route('galangDanaAdmin.index')->with('success', 'Kampanye berhasil dihapus.');
    }
}