<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\User;
use Database\Factories\BookFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BookFactory::new()->count(20)->create();
    }
}
