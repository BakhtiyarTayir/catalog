<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->productName,
            'description' => $this->faker->paragraph,
            'slug' => $this->faker->slug,
            'price' => $this->faker->randomFloat(2, 50, 200),
            'category_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}