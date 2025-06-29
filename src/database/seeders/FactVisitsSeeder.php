<?php

namespace Database\Seeders;

use App\Models\FactVisits;
use Illuminate\Database\Seeder;
use App\Models\FactVisit;
use App\Models\DimAge;
use App\Models\DimComic;
use App\Models\DimUser;
use App\Models\DimLocation;
use App\Models\DimDate;

class FactVisitsSeeder extends Seeder
{
    public function run()
    {
        $jumlah = 20;

        // Ambil ID dimensi
        $dateMingguIds = DimDate::whereRaw("DAYNAME(date) = 'Sunday'")->pluck('id')->toArray();
        $dateLainIds = DimDate::whereRaw("DAYNAME(date) != 'Sunday'")->pluck('id')->toArray();

        $comicFavoritId = DimComic::where('title', 'The Fragrant Flower Blooms with Dignity')->value('id');
        $comicLainIds = DimComic::where('title', '!=', 'The Fragrant Flower Blooms with Dignity')->pluck('id')->toArray();

        $userMaleIds = DimUser::where('gender', 'male')->pluck('id')->toArray();
        $userFemaleIds = DimUser::where('gender', 'female')->pluck('id')->toArray();

        $ageFavoritIds = DimAge::whereIn('age_group', ['13-17', '18-24'])->pluck('id')->toArray();
        $ageLainIds = DimAge::whereNotIn('age_group', ['13-17', '18-24'])->pluck('id')->toArray();

        $lokasiIndoIds = DimLocation::where('country', 'Indonesia')->pluck('id')->toArray();
        $lokasiLainIds = DimLocation::where('country', '!=', 'Indonesia')->pluck('id')->toArray();

        $devices = ['Mobile', 'Desktop'];

        for ($i = 0; $i < $jumlah; $i++) {

            $date_id = $i < 13 ? fake()->randomElement($dateMingguIds) : fake()->randomElement($dateLainIds);
            $comic_id = $i < 12 ? $comicFavoritId : fake()->randomElement($comicLainIds);
            $user_id = $i < 14 ? fake()->randomElement($userMaleIds) : fake()->randomElement($userFemaleIds);
            $age_id = $i < 15 ? fake()->randomElement($ageFavoritIds) : fake()->randomElement($ageLainIds);
            $location_id = $i < 16 ? fake()->randomElement($lokasiIndoIds) : fake()->randomElement($lokasiLainIds);

            FactVisits::create([
                'date_id'      => $date_id,
                'comic_id'     => $comic_id,
                'user_id'      => $user_id,
                'location_id'  => $location_id,
                'age_id'       => $age_id,
                'device'       => fake()->randomElement($devices),
            ]);
        }
    }
}
