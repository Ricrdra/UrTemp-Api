<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClassroomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            "class_name" => $this->faker->name,
            "area" => $this->faker->randomElement(\App\Enums\Areas::getAreas()),
        ];
    }
}
