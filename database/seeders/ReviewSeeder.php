<?php

namespace Database\Seeders;

use App\Models\Property;
use App\Models\Review;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Review::factory(100)->create() ;

    }
}
