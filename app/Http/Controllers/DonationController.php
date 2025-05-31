<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DonationController extends Controller
{
    public function create(Campaign $campaign)
    {
        return view('user.donations.create', compact('campaign'));
    }

public function store(Request $request)
{
    $request->validate([
        'campaign_id' => 'required|exists:campaigns,id',
        'donor_name' => 'required|string|max:255',
        'amount' => 'required|numeric|min:1',
        'message' => 'nullable|string|max:500',
    ]);

    try {
        DB::transaction(function () use ($request) {
            // 1. Find the campaign
            $campaign = Campaign::findOrFail($request->campaign_id);

            // 2. Create donation record
            Donation::create([
                'campaign_id' => $campaign->id,
                'donor_name' => $request->donor_name,
                'amount' => $request->amount,
                'message' => $request->message,
            ]);

            // 3. Update campaign amount
            $campaign->current_amount += $request->amount;
            $campaign->save();
        });

        return redirect()->route('donations.index')
            ->with('success', 'Terima kasih atas donasi Anda!');

    } catch (\Exception $e) {
        return redirect()->back()
            ->with('error', 'Terjadi kesalahan saat memproses donasi.')
            ->withInput();
    }
}

    public function index()
    {
        $campaigns = Campaign::all(); // Fetch all campaigns from the database
        return view('user.donations.index', compact('campaigns')); // Pass the campaigns to the view
    }

    public function edit(Donation $donation)
    {
        return view('user.donations.edit', compact('donation'));
    }

    public function update(Request $request, Donation $donation)
    {
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

        return redirect()->route('donations.index')
            ->with('success', 'Donasi berhasil diperbarui!');
    }

    public function destroy(Donation $donation)
    {
        // Kurangi jumlah terkumpul di kampanye
        $donation->campaign->current_amount -= $donation->amount;
        $donation->campaign->save();

        // Hapus donasi
        $donation->delete();

        return redirect()->route('donations.index')
            ->with('success', 'Donasi berhasil dihapus!');
    }

    public function show()
    {
        // Ambil semua donasi tanpa memfilter berdasarkan nama donatur
        $donations = Donation::with('campaign')->latest()->get();

        return view('user.donations.show', compact('donations'));
    }

   





}