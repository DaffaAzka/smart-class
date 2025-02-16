<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Media>
 */
class MediaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'file_name' => $this->faker->word . '.jpg',
            'mime_type' => 'image/jpeg',
            'path' => 'media/',
            'size' => $this->faker->numberBetween(1000, 100000), // Ukuran file dalam byte
        ];
    }
}
