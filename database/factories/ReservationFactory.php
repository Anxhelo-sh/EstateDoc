<?php

namespace Database\Factories;

use App\Models\Property;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $start_date = $this->faker->dateTimeBetween($startDate = '-2 month',$endDate = '-1 month') ;
        $end_date = $this->faker->dateTimeBetween($startDate = '-1 month',$endDate = '+1 month') ;
        return [
            'full_name'=>User::inRandomOrder()->first()->name,
            'email'=>User::inRandomOrder()->first()->email,
            'user_id'=>User::inRandomOrder()->first()->id,
            'property_id'=>Property::inRandomOrder()->first()->id,
            'no_of_persons'=>$this->faker->numberBetween($min = 1, $max = 10),
            'start_date'=>Carbon::parse($start_date)->format("Y-m-d"),
            'end_date'=>Carbon::parse($end_date)->format("Y-m-d"),
            //
        ];
    }
}
