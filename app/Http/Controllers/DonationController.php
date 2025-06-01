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

        'amount' => 'required|numeric|min:1000',
        'message' => 'nullable|string|max:500',
    ]);

    try {
        DB::transaction(function () use ($request) {

            $campaign = Campaign::findOrFail($request->campaign_id);
            Donation::create([
                'campaign_id' => $request->campaign_id,
                'donor_name' => auth()->user()->name, 
                'amount' => $request->amount,
                'message' => $request->message,
            ]);


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
        $campaigns = Campaign::all(); 
        return view('user.donations.index', compact('campaigns')); 
    }

    public function edit(Donation $donation)
    {
      
        if ($donation->donor_name !== auth()->user()->name) {
            return redirect()->route('donations.show')
                ->with('error', 'Anda tidak memiliki akses untuk mengedit donasi ini.');
        }

        return view('user.donations.edit', compact('donation'));
    }

    public function update(Request $request, Donation $donation)
    {

        if ($donation->donor_name !== auth()->user()->name) {
            return redirect()->route('donations.edit')
                ->with('error', 'Anda tidak memiliki akses untuk mengedit donasi ini.');
        }

        $request->validate([
            'amount' => 'required|numeric|min:1',
            'message' => 'nullable|string|max:500',
        ]);


        $amountDifference = $request->amount - $donation->amount;


        $donation->campaign->current_amount += $amountDifference;
        $donation->campaign->save();


        $donation->update([
            'amount' => $request->amount,
            'message' => $request->message,
        ]);

        return redirect()->route('donations.show')
            ->with('success', 'Donasi berhasil diperbarui!');
    }

    public function destroy(Donation $donation)
    {

        if ($donation->donor_name !== auth()->user()->name) {
            return redirect()->route('donations.show')
                ->with('error', 'Anda tidak memiliki akses untuk menghapus donasi ini.');
        }

    
        $donation->campaign->current_amount -= $donation->amount;
        $donation->campaign->save();

   
        $donation->delete();

        return redirect()->route('donations.show')
            ->with('success', 'Donasi berhasil dihapus!');
    }

    public function show()
    {
        
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