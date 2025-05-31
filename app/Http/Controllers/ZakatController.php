<?php

namespace App\Http\Controllers;

use App\Models\Zakat;
use Illuminate\Http\Request;

class ZakatController extends Controller
{
    public function index()
    {
        $zakat = Zakat::all(); // Ambil semua data zakat
        return view('user.zakat.index', compact('zakat'));
    }

    public function create()
    {
        return view('user.zakat.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pembayar_zakat' => 'required|string|max:255',
            'penghasilan_perbulan' => 'required|numeric',
            'bonus' => 'nullable|numeric',
            'utang' => 'nullable|numeric',
            'pantiasuhan' => 'required|string|max:255',
        ]);

        Zakat::create($validated);
        return redirect()->route('zakat.index')->with('success', 'Data zakat berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $zakat = Zakat::findOrFail($id);
        return view('user.zakat.edit', compact('zakat'));
    }

    public function update(Request $request, $id)
    {
        $zakat = Zakat::findOrFail($id);

        $zakat->update($request->all());

        // Redirect ke halaman pembayaran zakat yang baru diupdate
        return redirect()->route('zakat.pay', $zakat->id)
            ->with('success', 'Data zakat berhasil diperbarui. Silakan lakukan pembayaran ulang.');
    }

    public function destroy($id)
    {
        $zakat = Zakat::findOrFail($id);
        $zakat->delete();
        return redirect()->route('zakat.index')->with('success', 'Data zakat berhasil dihapus!');
    }
 
public function pay($id)
{
    $zakat = Zakat::findOrFail($id);
    $penghasilanBersih = $zakat->penghasilan_perbulan + ($zakat->bonus ?? 0) - ($zakat->utang ?? 0);
    $totalZakat = max($penghasilanBersih * 0.025, 0);

    return view('user.zakat.pay', compact('zakat', 'totalZakat'));
}

public function processPayment($id)
{
    $zakat = Zakat::findOrFail($id);

    // Tandai zakat sebagai sudah dibayar
    $zakat->is_paid = true;
    $zakat->save();

    return redirect()->route('zakat.index')->with('success', 'Zakat berhasil dibayar!');
}
}
