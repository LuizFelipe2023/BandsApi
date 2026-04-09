<?php

namespace App\Actions\Members;

use App\Models\Member;

class UpdateMember
{
    public function execute(Member $member, array $data): Member
    {
        $member->update($data);

        return $member->refresh();
    }
}