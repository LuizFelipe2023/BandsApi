<?php

namespace App\Actions\Albums;

use App\Models\Album;
use Illuminate\Support\Facades\DB;

class CreateAlbum
{
    public function execute(array $data): Album
    {
        return DB::transaction(function () use ($data) {
            $album = Album::create($data);

            if (isset($data['band_ids'])) {
                $album->bands()->sync($data['band_ids']);
            }

            if (isset($data['genre_ids'])) {
                $album->genres()->sync($data['genre_ids']);
            }

            return $album->load(['bands', 'genres']);
        });
    }
}