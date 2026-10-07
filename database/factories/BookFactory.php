<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Book>
 */
class BookFactory extends Factory
{
    protected $model = Book::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        
            return [
                'isbn' => $this->faker->unique()->isbn13(),
                'title' => $this->faker->sentence(rand(3, 5), false),
                'author' => $this->faker->name(),
                'published_year' => $this->faker->numberBetween(2000, 2024),
                'synopsis' => $this->faker->paragraph(),
                'is_available' => $this->faker->boolean(),  
        ];
    }
}
