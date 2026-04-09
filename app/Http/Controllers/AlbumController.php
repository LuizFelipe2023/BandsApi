<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Http\Requests\AlbumRequest;
use App\Http\Resources\AlbumResource;
use App\Actions\Albums\CreateAlbum;
use App\Actions\Albums\UpdateAlbum;
use App\Actions\Albums\DeleteAlbum;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class AlbumController extends Controller
{
    
    public function index(): AnonymousResourceCollection
    {
        $albums = Album::with(['bands', 'genres'])->paginate(10);
        return AlbumResource::collection($albums);
    }

    public function store(AlbumRequest $request, CreateAlbum $createAlbum): AlbumResource
    {
        $album = $createAlbum->execute($request->validated());
        return new AlbumResource($album);
    }

    public function show(Album $album): AlbumResource
    {
        return new AlbumResource($album->load(['bands', 'genres']));
    }

    public function update(AlbumRequest $request, Album $album, UpdateAlbum $updateAlbum): AlbumResource
    {
        $updatedAlbum = $updateAlbum->execute($album, $request->validated());
        return new AlbumResource($updatedAlbum);
    }

    public function destroy(Album $album, DeleteAlbum $deleteAlbum): Response
    {
        $deleteAlbum->execute($album);
        return response()->noContent(); 
    }
}