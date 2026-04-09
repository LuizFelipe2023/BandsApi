<?php

namespace App\Actions\Genres;
use App\Models\Genre;

class CreateGenre
{
    public function execute(array $data):Genre
    {
        return Genre::create([
            'name' => $data['name']
        ]);
    }
}