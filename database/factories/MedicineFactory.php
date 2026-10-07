<?php

namespace Database\Factories;

use App\Models\Medicine;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Medicine>
 */
class MedicineFactory extends Factory
{
    public function definition(): array
    {
        return [
            'code'             => $this->faker->unique()->bothify('OB-####'),
            'name'             => $this->faker->words(2, true) . ' ' . 
            $this->faker->randomElement(['500mg', '200mg', 'Syrup']),
            'category'         => $this->faker->randomElement(['Bebas', 'Bebas Terbatas', 'Keras', 'Sirup']),
            'price'            => $this->faker->numberBetween(5000, 150000),
            'stock'            => $this->faker->numberBetween(10, 200),
            'manufacture_date' => $this->faker->date('Y-m-d', '2023-12-31'),
            'expired_date'      => $this->faker->dateTimeBetween('+1 year', '+3 years')->format('Y-m-d'),
            'description'      => $this->faker->sentence(),
        ];
    }
}
