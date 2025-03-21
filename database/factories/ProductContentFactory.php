<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductContent>
 */
class ProductContentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => \App\Models\Product::factory(), // Relasi ke produk
            // 'type' => $this->faker->randomElement(['paragraph', 'image']),
            'header' => $this->faker->words(3, true),
            'content' => $this->faker->paragraph,
            'img_source' => $this->faker->word,
            'order' => $this->faker->numberBetween(1, 10),
        ];
    }
}
