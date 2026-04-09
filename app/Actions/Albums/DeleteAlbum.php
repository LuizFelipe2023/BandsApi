<?php

namespace App\Actions\Albums;

use App\Models\Album;

class DeleteAlbum
{
    public function execute(Album $album): bool
    {
        return $album->delete();
    }
}