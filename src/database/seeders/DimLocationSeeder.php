<?php

namespace Database\Seeders;

use App\Models\DimLocation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DimLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (DimLocation::count() == 0) {
            DimLocation::insert([
                ['country' => 'Indonesia', 'city' => 'Jakarta'],
                ['country' => 'Indonesia', 'city' => 'Bandung'],
                ['country' => 'Indonesia', 'city' => 'Surabaya'],
                ['country' => 'Indonesia', 'city' => 'Medan'],
                ['country' => 'Indonesia', 'city' => 'Yogyakarta'],
                ['country' => 'Indonesia', 'city' => 'Semarang'],
                ['country' => 'Indonesia', 'city' => 'Denpasar'],
                ['country' => 'Indonesia', 'city' => 'Makassar'],
                ['country' => 'Indonesia', 'city' => 'Balikpapan'],
                ['country' => 'Indonesia', 'city' => 'Palembang'],
                ['country' => 'Malaysia', 'city' => 'Kuala Lumpur'],
                ['country' => 'Malaysia', 'city' => 'Penang'],
                ['country' => 'Singapore', 'city' => 'Singapore'],
                ['country' => 'Thailand', 'city' => 'Bangkok'],
                ['country' => 'Vietnam', 'city' => 'Ho Chi Minh'],
                ['country' => 'Philippines', 'city' => 'Manila'],
                ['country' => 'Australia', 'city' => 'Sydney'],
                ['country' => 'Japan', 'city' => 'Tokyo'],
                ['country' => 'United States', 'city' => 'New York'],
                ['country' => 'United Kingdom', 'city' => 'London'],
            ]);
        }

    }
}
