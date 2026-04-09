<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name'     => 'Admin do Sistema',
            'email'    => 'admin@teste.com',
            'password' => Hash::make('123456'), 
        ]);

        User::factory(5)->create();
    }
}