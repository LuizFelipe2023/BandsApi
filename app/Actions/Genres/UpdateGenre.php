<?php

namespace App\Actions\Genres;
use App\Models\Genre;

class UpdateGenre
{
    public function execute(Genre $genre, array $data): Genre
    {
        $genre->update([
            'name' => $data['name']
        ]);
        return $genre;
    }
}