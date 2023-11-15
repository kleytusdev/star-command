<?php

namespace Database\Seeders;

use App\Enums\DocumentTypeEnum;
use App\Models\Person;
use Illuminate\Database\Seeder;

class PersonSeeder extends Seeder
{
    public function run(): void
    {
        Person::create([
            'document_type' => DocumentTypeEnum::DNI,
            'document_number' => 77777777,
            'name' => 'John Doe',
            'full_name' => 'John Doe Canada',
            'paternal_surname' => 'Doe',
            'maternal_surname' => 'Canada',
            'phone_number' => 999999999,
        ]);
    }
}
