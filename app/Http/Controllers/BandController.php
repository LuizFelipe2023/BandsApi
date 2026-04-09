<?php

namespace App\Http\Controllers;

use App\Models\Band;
use App\Actions\Bands\CreateBand;
use App\Actions\Bands\UpdateBand;
use App\Actions\Bands\DeleteBand;
use App\Http\Requests\BandRequest;
use App\Http\Resources\BandResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\JsonResponse;

class BandController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $bands = Band::with('genres')->orderBy('name')->get();
        return BandResource::collection($bands);
    }

    public function store(BandRequest $request, CreateBand $createBand): BandResource
    {
        $band = $createBand->execute($request->validated());

        return new BandResource($band);
    }

    public function show(Band $band): BandResource
    {
        return new BandResource($band->load('genres'));
    }

    public function update(BandRequest $request, Band $band, UpdateBand $updateBand): BandResource
    {
        $updatedBand = $updateBand->execute($band, $request->validated());
        return new BandResource($updatedBand);
    }


    public function destroy(Band $band, DeleteBand $deleteBand): JsonResponse
    {
        $deleteBand->execute($band);
        return response()->json(null, 204);
    }
}