<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MemberResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'       => $this->id,
            'name'     => $this->name,
            'nickname' => $this->nickname,
            'role' => $this->whenPivotLoaded('band_member', function () {
                return $this->pivot->role;
            }),
            'is_original_member' => $this->whenPivotLoaded('band_member', function () {
                return (bool) $this->pivot->is_original_member;
            }),
            'status' => $this->whenPivotLoaded('band_member', function () {
                return $this->pivot->left_at ? 'Ex-membro' : 'Ativo';
            }),
            'period' => $this->whenPivotLoaded('band_member', function () {
                return [
                    'joined' => $this->pivot->joined_at,
                    'left'   => $this->pivot->left_at,
                ];
            }),
            'bands' => BandResource::collection($this->whenLoaded('bands')),
        ];
    }
}