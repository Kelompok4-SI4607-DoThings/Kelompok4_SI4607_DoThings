<?php
use App\Models\Donation;

class DashboardController
{
    public function index()
    {
        // Ambil data jumlah donasi per bulan
        $donations = Donation::selectRaw('MONTH(created_at) as month, SUM(amount) as total')
                            ->groupBy('month')
                            ->orderBy('month')
                            ->get();

        // Mengirim data ke view
        return view('dashboard', ['donations' => $donations]);
    }
    
}
