<?php

namespace Database\Seeders;

use App\Models\Person;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $person = Person::create([
            'name' => 'super',
            'last_name' => 'user',
            'phone_number' => '123456789',
        ]);
        User::create([

            'user_name' => 'super',
            'id' => $person->id,
            'email' => 'super@user.com',
            'password' => bcrypt('password'),
            'role_id' => Role::where('name', 'administrator')->first()->id,
        ]);

        User::factory()->count(10)->create();
    }
}
