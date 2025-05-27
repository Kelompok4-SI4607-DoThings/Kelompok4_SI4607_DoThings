<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zakat;
use App\Models\ZakatAdmin;

class ZakatAdminController extends Controller
{
    public function index()
    {
            $zakats = Zakat::all(); // Ambil semua data zakat dari tabel zakat
        return view('admin.zakatAdmin.index', compact('zakats')); // Kirim data ke view
    }

    public function create()
    {
        return view('admin.zakatAdmin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|string',
        ]);

        ZakatAdmin::create($request->all());

        return redirect()->route('zakatAdmin.index')->with('success', 'Data zakat admin berhasil ditambahkan.');
    }

    public function show($id)
    {
        $zakat = Zakat::findOrFail($id); // Ambil data zakat berdasarkan ID
        return view('admin.zakatAdmin.show', compact('zakat')); // Kirim data ke view
    }

    public function edit($id)
    {
        $zakat = Zakat::findOrFail($id);
        return view('admin.zakatAdmin.edit', compact('zakat'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pembayar_zakat' => 'required|string|max:255',
            'penghasilan_perbulan' => 'required|numeric',
            'bonus' => 'nullable|numeric',
            'utang' => 'nullable|numeric',
            'pantiasuhan' => 'required|string|max:255',
        ]);

        $zakat = Zakat::findOrFail($id); // Ambil data zakat berdasarkan ID
        $zakat->update($request->all()); // Perbarui data zakat

        return redirect()->route('zakatAdmin.index')->with('success', 'Data zakat berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $zakat = Zakat::findOrFail($id); // Ambil data zakat berdasarkan ID
        $zakat->delete(); // Hapus data zakat

        return redirect()->route('zakatAdmin.index')->with('success', 'Data zakat berhasil dihapus.');
    }

    public function viewUserZakat()
    {
        $zakat = Zakat::all();
        return view('admin.zakatAdmin.userZakat', compact('zakat'));
    }

    public function updateStatus(Request $request, $id)
    {
        $zakat = Zakat::findOrFail($id); // Ambil data zakat berdasarkan ID
        $zakat->status = $request->status; // Perbarui kolom status
        $zakat->save(); // Simpan perubahan

        return redirect()->route('zakatAdmin.index')->with('success', 'Status zakat berhasil diperbarui.');
    }
}

