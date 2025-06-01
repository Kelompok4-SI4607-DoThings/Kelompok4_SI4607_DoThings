<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;
use App\Models\Campaign;
use Carbon\Carbon;

class UserDashboardController extends Controller
{
    public function index()
    {
        // Calculate total donations
        $totalDonations = Donation::sum('amount');
        
        // Calculate current month donations
        $currentMonthDonations = Donation::whereMonth('created_at', now()->month)
                                       ->whereYear('created_at', now()->year)
                                       ->sum('amount');

        // Get last 6 months data for chart
        $months = collect(range(0, 5))->map(function ($i) {
            return Carbon::now()->subMonths($i)->format('F');
        })->reverse();

        $labels = [];
        $data = [];

        foreach ($months as $monthName) {
            $monthNumber = Carbon::parse($monthName)->month;
            $labels[] = $monthName;

            $total = Donation::whereMonth('created_at', $monthNumber)
                             ->whereYear('created_at', now()->year)
                             ->sum('amount');

            $data[] = round($total / 1_000_000, 2); // convert to millions
        }

        // Calculate active campaigns
        $activeCampaigns = Campaign::where('status', 'approved')
                                  ->where('deadline', '>', now())
                                  ->count();

        // Calculate last month's active campaigns
        $lastMonthCampaigns = Campaign::where('status', 'approved')
                                     ->where('deadline', '>', now()->subMonth())
                                     ->whereMonth('created_at', now()->subMonth()->month)
                                     ->count();

        // Calculate percentage change
        $campaignPercentageChange = $lastMonthCampaigns > 0 
            ? (($activeCampaigns - $lastMonthCampaigns) / $lastMonthCampaigns * 100)
            : 0;

        // Get popular campaigns with target and current amounts
        $popularCampaigns = Campaign::where('status', 'approved')
            ->where('deadline', '>', now())
            ->orderBy('current_amount', 'desc')
            ->take(3)
            ->get(['id', 'title', 'description', 'image', 'target_amount', 'current_amount']);

        return view('user.dashboard', compact(
            'labels', 
            'data', 
            'totalDonations',
            'currentMonthDonations',
            'activeCampaigns',
            'campaignPercentageChange',
            'popularCampaigns'
        ));
    }
}
