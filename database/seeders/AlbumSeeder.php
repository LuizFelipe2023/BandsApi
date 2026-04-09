<?php

namespace Database\Seeders;

use App\Models\Album;
use App\Models\Band;
use App\Models\Genre;
use Illuminate\Database\Seeder;

class AlbumSeeder extends Seeder
{
    public function run(): void
    {
        $bands = Band::all();
        $genres = Genre::all();

        if ($bands->isEmpty() || $genres->isEmpty()) {
            $this->command->warn("Crie bandas e gêneros antes de rodar o AlbumSeeder!");
            return;
        }

        Album::factory(20)->create()->each(function ($album) use ($bands, $genres) {
            
            $album->bands()->attach(
                $bands->random(rand(1, 2))->pluck('id')->toArray()
            );

            $album->genres()->attach(
                $genres->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}