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
            'photo_uri' => null,
            'email_verified_at' => now(),
            'password' => '12341234',
            'remember_token' => Str::random(10),
            'person_id' => 1,
        ]);

        $user->assignRole(RoleEnum::GENERAL_MANAGER);
    }
}
