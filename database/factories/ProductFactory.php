<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $name = $this->faker->unique()->words(3, true); // Nama produk acak
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'header' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'image' => 'products/',
            'image_header' => 'products/',
            'category_id' => \App\Models\Category::factory(), // Relasi ke kategori
        ];
    }
}
