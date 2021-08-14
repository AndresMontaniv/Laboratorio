<?php

namespace Database\Factories;

use App\Models\Period;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reservation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
           'date'=>$this->faker->date('Y-m-d','now'),
           'user_id'=>User::all()->random()->id,
           'room_id'=>Room::all()->random()->id,
           'period_id'=>Period::all()->random()->id
        ];
    }
}
