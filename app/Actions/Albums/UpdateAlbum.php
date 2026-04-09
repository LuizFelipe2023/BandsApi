<?php

namespace App\Actions\Albums;

use App\Models\Album;
use Illuminate\Support\Facades\DB;

class UpdateAlbum
{
    public function execute(Album $album, array $data): Album
    {
        return DB::transaction(function () use ($album, $data) {
            $album->update($data);

            if (isset($data['band_ids'])) {
                $album->bands()->sync($data['band_ids']);
            }

            if (isset($data['genre_ids'])) {
                $album->genres()->sync($data['genre_ids']);
            }

            return $album->refresh()->load(['bands', 'genres']);
        });
    }
}