<?php

namespace Database\Seeders;

use App\Models\Property;
use App\Models\Reservation;
use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Reservation::factory(30)->create() ;

    }
}
