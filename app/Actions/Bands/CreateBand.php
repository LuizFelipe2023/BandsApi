<?php

namespace App\Actions\Bands;

use App\Models\Band;
use App\Models\Member;
use Illuminate\Support\Facades\DB;

class CreateBand
{
    public function execute(array $data): Band
    {
        return DB::transaction(function () use ($data) {
            
            $band = Band::create($data);

            if (isset($data['genre_ids'])) {
                $band->genres()->sync($data['genre_ids']);
            }

            if (isset($data['members'])) {
                foreach ($data['members'] as $memberData) {
                    
                    $member = isset($memberData['id']) 
                        ? Member::findOrFail($memberData['id']) 
                        : Member::create([
                            'name'     => $memberData['name'],
                            'nickname' => $memberData['nickname'] ?? null,
                        ]);

                    $band->members()->attach($member->id, [
                        'role'               => $memberData['role'],
                        'joined_at'          => $memberData['joined_at'] ?? now(),
                        'is_original_member' => $memberData['is_original_member'] ?? false,
                    ]);
                }
            }

            return $band->load(['genres', 'members']);
        });
    }
}