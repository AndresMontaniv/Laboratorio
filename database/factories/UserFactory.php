<?php

namespace Database\Factories;

use App\Models\Laboratory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        return [
            
            'username' => $this->faker->name(),
            'name' => $this->faker->name(),
            'lastname' => $this->faker->lastName(),
            'phone' => $this->faker->randomElement(['78125459','78178256','74940481','67711539']),
            'ci' => $this->faker->randomElement(['8080814','8226422','8940481','8711229']),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' =>bcrypt('123'), 
            'remember_token' => Str::random(10),
            'laboratory_id' => Laboratory::all()->random()->id
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
