<?php

namespace Database\Seeders;

use App\Models\DimUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DimUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (DimUser::count() == 0) {
            DimUser::insert([
            ['gender' => 'male'],
            ['gender' => 'male'],
            ['gender' => 'male'],
            ['gender' => 'male'],
            ['gender' => 'male'],
            ['gender' => 'male'],
            ['gender' => 'male'],
            ['gender' => 'male'],
            ['gender' => 'male'],
            ['gender' => 'male'],
            ['gender' => 'female'],
            ['gender' => 'female'],
            ['gender' => 'female'],
            ['gender' => 'female'],
            ['gender' => 'female'],
            ['gender' => 'female'],
            ['gender' => 'female'],
            ['gender' => 'female'],
            ['gender' => 'female'],
            ['gender' => 'female'],
            ]);
        }
    }
}
