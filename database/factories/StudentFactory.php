<?php

namespace Database\Factories;

use App\Models\Person;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $person = new Person();
        $person->name = $this->faker->firstName;
        $person->last_name = $this->faker->lastName;
        $person->phone_number = $this->faker->phoneNumber;
        $person->save();
        return [
            'id' => $person->id,
            'enrollment' => $this->faker->randomNumber(6),
            'classroom_id' => $this->faker->numberBetween(1, 10),
            'gender' => $this->faker->randomElement(['F', 'M'])
        ];
    }
}
