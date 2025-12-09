<?php

namespace Database\Factories;

use App\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'username' => $this->faker->word . '_' . $this->faker->word,
            'email' => $this->faker->unique()->safeEmail,
            'password' => '$2y$10$oWeLVANkG.dkOCsbqynHyue3KL1MUXw6JEnQf2vpaaL.0gCBlYDei', // demo
            'role' => 'user',
            'remember_token' => Str::random(10),
        ];
    }
}
