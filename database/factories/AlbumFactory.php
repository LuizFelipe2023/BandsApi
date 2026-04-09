<?php

namespace Database\Factories;

use App\Models\Album;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Album>
 */
class AlbumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),
            'release_date' => fake()->date(),
            'description' => fake()->paragraph(),
            'type' => fake()->randomElement(['studio', 'live', 'compilation']),
            'cover_image' => 'covers/default.jpg', 
        ];
    }
}
