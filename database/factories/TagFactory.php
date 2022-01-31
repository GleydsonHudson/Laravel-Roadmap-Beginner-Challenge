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
    public function definition()
    {
        return [
            'name' => json_encode(['en' => $this->faker->word()]),
            'slug' => json_encode(['en' => $this->faker->slug()])
        ];
    }
}
