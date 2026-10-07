<?php

namespace Database\Seeders;

use App\Models\Teacher;
use App\Models\User;
use Database\Factories\BookFactory;
use Database\Factories\TeacherFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    
    public function run(): void
    {
       \App\Models\Medicine::factory(25)->create();
    }
}
