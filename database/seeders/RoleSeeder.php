<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Role::create(['name' => RoleEnum::SELLER]);
        Role::create(['name' => RoleEnum::STORER]);
        Role::create(['name' => RoleEnum::GENERAL_MANAGER]);
    }
}
