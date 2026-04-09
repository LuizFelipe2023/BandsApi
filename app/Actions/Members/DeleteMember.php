<?php

namespace App\Actions\Members;

use App\Models\Member;

class DeleteMember
{
    public function execute(Member $member): bool
    {
        return $member->delete();
    }
}