<?php

namespace Database\Seeders;

use App\Models\DimAge;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DimAgeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(DimAge::count()==0){
            $ages = [
                ['age_group' => '13-17',],
                ['age_group' => '18-24',],
                ['age_group' => '25-34',],
                ['age_group' => '35-44',],
                ['age_group' => '45-54',],
                ['age_group' => '55-64',],
                ['age_group' => '65+',],
            ];

            foreach ($ages as $age) {
                DimAge::create($age);
            }
        }
    }
}

