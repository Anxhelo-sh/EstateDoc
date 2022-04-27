<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' =>User::inRandomOrder()->first()->id,
            'property_id' =>Property::inRandomOrder()->first()->id,
            'review_score'=> $this->faker->randomFloat(1,0,5),
            'message'=>$this->faker->text ,
        ];
    }
}
