<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{

    public function run(): void
    {
        $genres = [
            'Heavy Metal',
            'Power Metal',
            'Thrash Metal',
            'Death Metal',
            'Hard Rock',
            'Punk Rock',
            'Progressive Metal',
            'Grunge',
            'Black Metal',
            'Nu Metal',
            'Pop',
            'Synth-pop',
            'Techno',
            'House',
            'Lo-fi',
            'EDM',
            'Hip Hop',
            'Trap',
            'R&B',
            'Reggae',
            'Soul',
            'Jazz',
            'Blues',
            'Funk (Classic)',
            'MPB',
            'Samba',
            'Bossa Nova',
            'Sertanejo',
            'Forró',
            'Pagode',
            'Axé',
            'Classical',
            'Country',
            'Folk',
            'Indie',
            'Disco'
        ];

        foreach ($genres as $name) {
            Genre::firstOrCreate(['name' => $name]);
        }
    }
}