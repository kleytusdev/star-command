<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'email' => 'test@gmail.com',
            'photo_uri' => 'https://i.pinimg.com/originals/2e/e6/4c/2ee64c1f8e4358d928d265f5b8389a35.gif',
            'email_verified_at' => now(),
            'password' => '12341234',
            'remember_token' => Str::random(10),
            'person_id' => 1,
        ]);

        $user->assignRole(RoleEnum::GENERAL_MANAGER);
    }
}
