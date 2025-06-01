<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Donation;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function create(Campaign $campaign)
    {
        return view('user.donations.create', compact('campaign'));
    }

public function store(Request $request)
{
    $request->validate([
        'amount' => 'required|numeric|min:1000',
        'message' => 'nullable|string|max:500',
    ]);

    try {
        DB::transaction(function () use ($request) {
            $campaign = Campaign::findOrFail($request->campaign_id);
            
            // Buat donasi dengan nama donor dari user yang login
            Donation::create([
                'campaign_id' => $request->campaign_id,
                'donor_name' => auth()->user()->name, // Gunakan nama user yang login
                'amount' => $request->amount,
                'message' => $request->message,
            ]);

            $campaign->current_amount += $request->amount;
            $campaign->save();
        });

        return redirect()->route('donations.index')
            ->with('success', 'Terima kasih atas donasi Anda!');
    } catch (\Exception $e) {
        return back()->with('error', 'Terjadi kesalahan saat memproses donasi.');
    }
}

    public function index()
    {
        $campaigns = Campaign::all(); // Fetch all campaigns from the database
        return view('user.donations.index', compact('campaigns')); // Pass the campaigns to the view
    }

    public function edit(Donation $donation)
    {
        // Cek apakah donasi ini milik user yang sedang login
        if ($donation->donor_name !== auth()->user()->name) {
            return redirect()->route('donations.show')
                ->with('error', 'Anda tidak memiliki akses untuk mengedit donasi ini.');
        }

        return view('user.donations.edit', compact('donation'));
    }

    public function update(Request $request, Donation $donation)
    {
        // Cek apakah donasi ini milik user yang sedang login
        if ($donation->donor_name !== auth()->user()->name) {
            return redirect()->route('donations.edit')
                ->with('error', 'Anda tidak memiliki akses untuk mengedit donasi ini.');
        }

        $request->validate([
            'amount' => 'required|numeric|min:1',
            'message' => 'nullable|string|max:500',
        ]);

        // Hitung selisih jumlah donasi
        $amountDifference = $request->amount - $donation->amount;

        // Update jumlah terkumpul di kampanye
        $donation->campaign->current_amount += $amountDifference;
        $donation->campaign->save();

        // Update donasi
        $donation->update([
            'amount' => $request->amount,
            'message' => $request->message,
        ]);

        return redirect()->route('donations.show')
            ->with('success', 'Donasi berhasil diperbarui!');
    }

    public function destroy(Donation $donation)
    {
        // Cek apakah donasi ini milik user yang sedang login
        if ($donation->donor_name !== auth()->user()->name) {
            return redirect()->route('donations.show')
                ->with('error', 'Anda tidak memiliki akses untuk menghapus donasi ini.');
        }

        // Kurangi jumlah terkumpul di kampanye
        $donation->campaign->current_amount -= $donation->amount;
        $donation->campaign->save();

        // Hapus donasi
        $donation->delete();

        return redirect()->route('donations.show')
            ->with('success', 'Donasi berhasil dihapus!');
    }

    public function show()
    {
        // Ganti ini
        // $donations = Donation::with('campaign')->latest()->get();

        // Menjadi ini - hanya ambil donasi milik user yang login
        $donations = Donation::where('donor_name', auth()->user()->name)
            ->with('campaign')
            ->latest()
            ->get();

        return view('user.donations.show', compact('donations'));
    }

    public function detail($id)
    {
        $campaign = Campaign::with('user')->findOrFail($id);
        return view('user.donations.detail', compact('campaign'));
    }

    
}