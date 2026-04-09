<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Actions\Genres\{CreateGenre, UpdateGenre, DeleteGenre};
use App\Http\Requests\GenreRequest;
use App\Http\Resources\GenreResource;

class GenreController extends Controller
{
    public function index()
    {
           return GenreResource::collection(Genre::orderBy('name')->get());
    }

    public function store(GenreRequest $request, CreateGenre $createGenre)
    {
        $genre = $createGenre->execute($request->validated());
        return new GenreResource($genre);
    }

    public function show(Genre $genre)
    {
           return new GenreResource($genre);
    }

    public function update(GenreRequest $request, Genre $genre, UpdateGenre $updateGenre)
    {
        $genre = $updateGenre->execute($genre, $request->validated());
        return new GenreResource($genre);
    }

    public function destroy(Genre $genre, DeleteGenre $deleteGenre)
    {
        $deleteGenre->execute($genre);
        return response()->noContent();
    }
}
