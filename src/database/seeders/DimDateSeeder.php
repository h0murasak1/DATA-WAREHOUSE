<?php

namespace Database\Seeders;

use App\Models\DimDate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DimDateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(DimDate::count()==0){
            $dates = [
                '2023-10-01', // Minggu
                '2023-10-08', // Minggu
                '2023-10-15', // Minggu
                '2023-10-22', // Minggu
                '2023-10-29', // Minggu
                '2023-10-02',
                '2023-10-03',
                '2023-10-04',
                '2023-10-05',
                '2023-10-06',
                '2023-10-07',
                '2023-10-09',
                '2023-10-10',
                '2023-10-11',
                '2023-10-12',
                '2023-10-13',
                '2023-10-14',
                '2023-10-16',
                '2023-10-17',
                '2023-10-18',
            ];
            

            foreach ($dates as $date) {
                DimDate::create([
                    'date' => $date,
                    'day_name' => date('l', strtotime($date)),
                    'month' => date('m', strtotime($date)),
                    'year' => date('Y', strtotime($date)),
                ]);
            }
        }
    }
}
