<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->unique()->word; // Nama kategori acak
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => $this->faker->sentence,
            'image' => 'categories/no-image.jpg',
            'parent_id' => null, // Default: top-level category
            'order' => $this->faker->numberBetween(1, 10),
            'type' => $this->faker->randomElement(['category', 'link', 'contact', 'product']),
            'url' => $this->faker->url,
        ];
    }
}
