<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'slug'=> $this->faker->unique()->slug(),
            'name' => $this->faker->word(),
        ];
    }
}
