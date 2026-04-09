<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    public function run(): void
    {
        Member::factory(30)->create();

        Member::create([
            'name'     => 'Chester Charles Bennington',
            'nickname' => 'Chazy Chaz',
        ]);
    }
}