<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'title' => $this->faker->title(),
            'slug' => $this->faker->unique()->slug(),
            'body' => $this->faker->paragraph(),
            'published_at' => today(),
            'meta' => [
                'title' => $this->faker->sentence(),
                'description' => $this->faker->sentence(),
                'canonical_link' => $this->faker->sentence(),
            ],
        ];
    }
}
