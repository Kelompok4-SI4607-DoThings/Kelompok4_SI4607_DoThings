<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\KomunitasAdmin;
use Illuminate\Http\Request;

class KomunitasAdminController extends Controller
{
    public function index()
    {
        $komunitas = KomunitasAdmin::orderBy('created_at', 'desc')->paginate(9); // atau jumlah per halaman sesuai kebutuhan
        return view('admin.komunitasAdmin.index', compact('komunitas'));
    }

    public function create()
    {
        return view('admin.komunitasAdmin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_komunitas' => 'required',
            'tanggal_dibuat' => 'required|date',
            'category' => 'required',
            'deskripsi' => 'required',
        ]);

        KomunitasAdmin::create($request->all());
        return redirect()->route('admin.komunitasAdmin.index')->with('success', 'Komunitas added successfully');
    }

    public function edit($id)
    {
        $komunitas = KomunitasAdmin::findOrFail($id);
        return view('admin.komunitasAdmin.edit', compact('komunitas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul_komunitas' => 'required',
            'tanggal_dibuat' => 'required|date',
            'category' => 'required',
            'deskripsi' => 'required',
        ]);

        $komunitas = KomunitasAdmin::findOrFail($id);
        $komunitas->update($request->all());
        return redirect()->route('admin.komunitasAdmin.index')->with('success', 'Komunitas updated successfully');
    }

    public function destroy($id)
    {
        $komunitas = KomunitasAdmin::findOrFail($id);
        $komunitas->delete();
        return redirect()->route('admin.komunitasAdmin.index')->with('success', 'Komunitas deleted successfully');
    }
    public function show($id)
{
    // Cari komunitas berdasarkan ID
    $komunitas = KomunitasAdmin::findOrFail($id);

    // Mengembalikan tampilan dengan data komunitas
    return view('admin.komunitasAdmin.show', compact('komunitas'));
}
}