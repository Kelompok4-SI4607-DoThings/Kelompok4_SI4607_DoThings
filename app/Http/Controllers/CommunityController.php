<?php

namespace App\Http\Controllers;

use App\Models\Community;
use Illuminate\Http\Request;

class CommunityController extends Controller
{
    public function index()
    {
        $communities = Community::all();
        return view('user.community.index', compact('communities'));
    }

    public function create()
    {
        return view('user.community.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Community::create($request->only('name', 'description'));
        return redirect()->route('communities.index')->with('success', 'Komunitas berhasil ditambahkan.');
    }

    public function edit(Community $community)
    {
        return view('user.community.edit', compact('community'));
    }

    public function update(Request $request, Community $community)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $community->update($request->only('name', 'description'));
        return redirect()->route('communities.index')->with('success', 'Komunitas berhasil diperbarui.');
    }

    public function destroy(Community $community)
    {
        $community->delete();
        return redirect()->route('communities.index')->with('success', 'Komunitas berhasil dihapus.');
    }
}