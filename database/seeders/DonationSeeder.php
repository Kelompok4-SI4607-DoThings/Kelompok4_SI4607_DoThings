<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Donation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class DonationSeeder extends Seeder
{
    public function run()
    {
        $campaignIds = DB::table('campaigns')->pluck('id')->toArray();

        if (empty($campaignIds)) {
            $this->command->warn('Tidak ada data campaign. Seeder dihentikan.');
            return;
        }

        for ($i = 0; $i < 100; $i++) {
            Donation::create([
                'campaign_id' => fake()->randomElement($campaignIds),
                'donor_name' => fake()->name(),
                'amount' => fake()->randomFloat(2, 10000, 2000000), // Rp 10.000 - 2 juta
                'message' => fake()->optional()->sentence(),
                'created_at' => fake()->dateTimeBetween('-6 months', 'now'),
                'updated_at' => now(),
            ]);
        }
    }
}
