<?php

namespace Database\Factories;

use App\Models\Person;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $person = new Person();
        $person->name = $this->faker->name;
        $person->last_name = $this->faker->lastName;
        $person->phone_number = $this->faker->phoneNumber;
        $person->save();

        return [
            "id" => $person->id,
            "user_name" => $this->faker->userName,
            "email" => $this->faker->unique()->safeEmail,
            "password" => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            "role_id" => $this->faker->numberBetween(1, 2),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
