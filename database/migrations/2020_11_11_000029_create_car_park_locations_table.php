<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarParkLocationsTable extends Migration
{
    public function up()
    {
        Schema::create('car_park_locations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('location');
            $table->boolean('is_enable')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
