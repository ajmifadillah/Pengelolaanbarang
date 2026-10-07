<?php

namespace Database\Seeders;

use App\Models\Fabrics;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FabricsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Fabrics::factory()->count(10)->create();
    }
}
