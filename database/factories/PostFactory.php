<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'title' => fake()->sentence(),
            'slug' => fake()->unique()->slug(3),
            'body' => fake()->paragraphs(10, true),
            'image' => fake()->imageUrl(600, 400, null, true, null, false, 'png'),
            'published_at' => fake()->optional()->dateTimeBetween('-1 year', '+1 week'),
            'created_at' => now(),
            'updated_at' => now(),
            'featured' => fake()->boolean(10), // 20% chance of being featured
        ];
    }
}
