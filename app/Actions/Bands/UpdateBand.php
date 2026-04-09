<?php

namespace App\Actions\Bands;

use App\Models\Band;
use App\Models\Member;
use Illuminate\Support\Facades\DB;

class UpdateBand
{
    public function execute(Band $band, array $data): Band
    {
        return DB::transaction(function () use ($band, $data) {
            
            $band->update($data);

            if (isset($data['genre_ids'])) {
                $band->genres()->sync($data['genre_ids']);
            }

            if (isset($data['members'])) {
                $formattedMembers = [];

                foreach ($data['members'] as $memberData) {
                    $member = isset($memberData['id']) 
                        ? Member::findOrFail($memberData['id']) 
                        : Member::create([
                            'name'     => $memberData['name'],
                            'nickname' => $memberData['nickname'] ?? null,
                        ]);

                    $formattedMembers[$member->id] = [
                        'role'               => $memberData['role'],
                        'joined_at'          => $memberData['joined_at'] ?? now(),
                        'left_at'            => $memberData['left_at'] ?? null,
                        'is_original_member' => $memberData['is_original_member'] ?? false,
                    ];
                }

                $band->members()->sync($formattedMembers);
            }

            return $band->refresh()->load(['genres', 'members']);
        });
    }
}