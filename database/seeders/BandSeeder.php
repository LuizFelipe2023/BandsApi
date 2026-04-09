<?php

namespace Database\Seeders;

use App\Models\Band;
use App\Models\Member;
use Illuminate\Database\Seeder;

class BandSeeder extends Seeder
{
    public function run(): void
    {
        $members = Member::all();

        Band::factory(10)->create()->each(function ($band) use ($members) {
            $randomMembers = $members->random(rand(3, 5));

            foreach ($randomMembers as $member) {
                $band->members()->attach($member->id, [
                    'role'               => fake()->randomElement(['Vocalist', 'Guitarist', 'Drummer', 'Bassist', 'DJ']),
                    'joined_at'          => fake()->date(),
                    'is_original_member' => fake()->boolean(70),
                    'left_at'            => fake()->boolean(20) ? fake()->date() : null, 
                ]);
            }
        });
    }
}