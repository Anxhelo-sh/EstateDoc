<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->float('price') ;
            $table->unsignedBigInteger('user_id') ;
            $table->string('category') ;
            $table->string('type') ;
            $table->string('street_adress');
            $table->string('city');
            $table->string('state');
            $table->integer('number_of_rooms') ;
            $table->integer('number_of_bathrooms') ;

            $table->boolean('has_garden')
                ->default(0) ;
            $table->boolean('has_pool')
                ->default(0) ;

            $table->boolean('has_garage')
                ->default(0) ;

            $table->boolean('has_furnitures')
                ->default(0) ;

            $table->boolean('status')
                ->default(0) ;

            $table->string('image');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
