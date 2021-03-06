<?php

namespace Database\Factories;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Database\Eloquent\Factories\Factory;

class PermissionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Permission::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id, //this is the super admin CARLOS
            'role_id' => $this->faker->randomElement([1,2,3])
        ];
    }
}
