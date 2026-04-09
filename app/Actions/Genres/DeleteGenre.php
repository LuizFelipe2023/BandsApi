<?php

namespace App\Actions\Genres;

use App\Models\Genre;

class DeleteGenre
{
    public function execute(Genre $genre): bool
    {
        return $genre->delete();
    }
}