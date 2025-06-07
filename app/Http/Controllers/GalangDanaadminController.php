<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\FundraisingCategory;
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

        $campaign = Campaign::findOrFail($id);
        $campaign->update([
            'status' => $request->status,
            'suggestions' => $request->suggestions,  // Pastikan field ini terisi
        ]);

        return redirect()->route('galangDanaAdmin.index')
            ->with('success', 'Kampanye berhasil diperbarui.');
    }

    public function destroy($id)
    {
    $campaign = Campaign::findOrFail($id);
    $campaign->delete();

    return redirect()->route('galangDanaAdmin.index')->with('success', 'Kampanye berhasil dihapus.');
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
            'description' => 'required|string'
        ]);

        FundraisingCategory::create([
            'name' => $request->category_name,
            'description' => $request->description,
            'status' => 'active'
        ]);

        return redirect()->back()->with('success', 'Kategori galang dana berhasil ditambahkan');
    }

    public function createCategory()
    {
        $categories = FundraisingCategory::all();
        return view('admin.galangDanaAdmin.create', compact('categories'));
    }
    public function destroyCategory($id)
{
    $category = FundraisingCategory::findOrFail($id);
    $category->delete();

    return redirect()->route('galangDanaAdmin.createCategory')
        ->with('success', 'Kategori berhasil dihapus');
}
}