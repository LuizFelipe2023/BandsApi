<?php

namespace App\Actions\Members;

use App\Models\Band;
use App\Models\Member;

class CreateMember
{
    public function execute(Band $band, array $data): Member
    {
        return $band->members()->create([
            'name'               => $data['name'],
            'nickname'           => $data['nickname'] ?? null,
            'role'               => $data['role'],
            'is_original_member' => $data['is_original_member'] ?? false,
            'joined_at'          => $data['joined_at'] ?? now(),
        ]);
    }
}