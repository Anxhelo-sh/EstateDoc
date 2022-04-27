<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User ;
class PropertyFactory extends Factory
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
            'price'=>$this->faker->randomFloat(2,50,1000),
            'user_id'=>User::inRandomOrder()->first()->id,
            'category'=>$this->faker->randomElement(["House","Appartment","Storage unit","Office","Land"]),
            'type'=>$this->faker->randomElement(["Single-Family Home","Townhome","Condos","Victorian","Other"]),
            'street_adress'=>$this->faker->streetName,
            'city'=>$this->faker->city,
            'state'=>$this->faker->state,
            'number_of_rooms'=>$this->faker->numberBetween($min = 1, $max = 7),
            'number_of_bathrooms'=>$this->faker->numberBetween($min = 1, $max = 6),
            'has_garden'=>$this->faker->boolean(),
            'has_pool'=>$this->faker->boolean(),
            'has_garage'=>$this->faker->boolean(),
            'has_furnitures'=>$this->faker->boolean(),
            'status'=>$this->faker->boolean(),
            'image'=>$this->faker->randomElement(["alejandra-cifre-gonzalez-ylyn5r4vxcA-unsplash.jpg","zac-gudakov-ztWpwTEx728-unsplash.jpg","naomi-ellsworth-EMPLSuvDuhQ-unsplash.jpg"]),
            'start_date'=>Carbon::parse($start_date)->format("Y-m-d"),
            'end_date'=>Carbon::parse($end_date)->format("Y-m-d"),
        ];
    }
}
