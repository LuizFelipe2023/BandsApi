<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BandResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'          => $this->id,
            'name'        => $this->name,
            'date_formed' => $this->date_formed, 
            'country'     => $this->country,
            'status'      => $this->status,
            'genres'      => GenreResource::collection($this->whenLoaded('genres')),
            'members'     => MemberResource::collection($this->whenLoaded('members')),
            'created_at'  => $this->created_at->format('Y-m-d H:i:s'),
        ];
    }
}