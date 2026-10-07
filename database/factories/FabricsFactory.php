<?php

namespace Database\Factories;

use App\Models\fabrics;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Fabrics>
 */
class FabricsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => 'KAN-' . fake()->unique()->numberBetween(1, 999),
            'name' => fake()->randomElement([
                'Katun Combed 30s',
                'Katun Carded',
                'Sutra Premium',
                'Polyester PE',
                'Denim Jeans',
                'Rayon Viscose',
            ]),
            'material_type' => fake()->randomElement([
                'Katun',
                'Sutra',
                'Polyester',
                'Denim',
                'Rayon',
            ]),
            'color' => fake()->safeColorName(),
            'stock_yard' => fake()->randomFloat(2, 10, 500),
            'price_per_yard' => fake()->numberBetween(10000, 100000),
            'tanggal_masuk' => fake()->date(),
            'rak' => 'RAK-' . fake()->randomElement([
                'A1',
                'A2',
                'B1',
                'B2',
                'C1',
                'C2',
            ]),
        ];
    }
}
