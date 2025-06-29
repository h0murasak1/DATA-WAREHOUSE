<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        if (User::count() == 0) {
            $user = User::factory()->create([
                'name' => 'Admin',
                'email' => 'admin@admin.com',
            ]);

            $user->assignRole('super_admin');
        }
        $this->call([
            DimUserSeeder::class,
            DimAgeSeeder::class,
            DimDateSeeder::class,
            DimLocationSeeder::class,
            DimComicSeeder::class,
            FactVisitsSeeder::class,
            ThemeSeeder::class,
        ]);
    }
}
