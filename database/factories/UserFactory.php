<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;


class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $password="123456789";
        return [
            'name' => $this->faker->firstNameFemale,
            'surname' => $this->faker->lastname,
            'gender' => 'Female',
            'age' => '1998-07-21',
            'role_id' => 3,
            'mobile' => 76123456,
           // 'email' => $this->faker->unique()->safeEmail,
            'email' => 'admin@morento.com',
            'email_verified_at' => now(),
            'password' => Hash::make($password), // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
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
