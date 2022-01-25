<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'comment' => $this->faker->sentence(50),
            'user_id' => User::factory(),
            'post_id' => Post::factory()
        ];
    }
}
