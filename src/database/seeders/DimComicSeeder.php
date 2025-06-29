<?php

namespace Database\Seeders;

use App\Models\DimComic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DimComicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(DimComic::count()==0){
            DimComic::insert([
                ['title' => 'Naruto', 'genre' => 'Shounen'],
                ['title' => 'Boruto', 'genre' => 'Shouen'],
                ['title' => 'JoJo', 'genre' => 'Adventure'],
                ['title' => 'Bleach', 'genre' => 'Action'],
                ['title' => 'The Fragrant Flower Blooms with Dignity', 'genre' => 'Romance'],
            ]);
        }
    }
}
