<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class ViewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'post_id' => Post::factory(),
            'ip' => $this->faker->ipv4(),
            'agent' => $this->faker->userAgent(),
            'referer' => $this->faker->url()

        ];
    }
}
