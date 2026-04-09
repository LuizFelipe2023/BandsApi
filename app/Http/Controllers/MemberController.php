<?php

namespace App\Http\Controllers;

use App\Models\Band;
use App\Models\Member;
use App\Actions\Members\{CreateMember, UpdateMember, DeleteMember};
use App\Http\Requests\MemberRequest;
use App\Http\Resources\MemberResource;

class MemberController extends Controller
{
    public function store(Band $band, MemberRequest $request, CreateMember $action)
    {
        $member = $action->execute($band, $request->validated());
        return new MemberResource($member);
    }

    public function update(MemberRequest $request, Member $member, UpdateMember $action)
    {
        $updated = $action->execute($member, $request->validated());
        return new MemberResource($updated);
    }

    public function destroy(Member $member, DeleteMember $action)
    {
        $action->execute($member);
        return response()->noContent();
    }
}