<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCarparkLogsTable extends Migration
{
    public function up()
    {
        Schema::table('carpark_logs', function (Blueprint $table) {
            $table->unsignedInteger('carplate_id');
            $table->foreign('carplate_id', 'carplate_fk_2562828')->references('id')->on('vehicle_mangements');
            $table->unsignedInteger('location_id')->nullable();
            $table->foreign('location_id', 'location_fk_2562829')->references('id')->on('car_park_locations');
        });
    }
}
