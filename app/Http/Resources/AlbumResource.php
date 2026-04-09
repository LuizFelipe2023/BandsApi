<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AlbumResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'           => $this->id,
            'title'        => $this->title,
            'type'         => $this->type,
            'release_date' => $this->release_date,
            'description'  => $this->description,
            'bands'        => BandResource::collection($this->whenLoaded('bands')),
            'genres'       => GenreResource::collection($this->whenLoaded('genres')),
            'created_at'   => $this->created_at->format('Y-m-d H:i:s'),
        ];
    }
}