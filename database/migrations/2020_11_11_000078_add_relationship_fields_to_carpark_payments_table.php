<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCarparkPaymentsTable extends Migration
{
    public function up()
    {
        Schema::table('carpark_payments', function (Blueprint $table) {
            $table->unsignedInteger('location_id');
            $table->foreign('location_id', 'location_fk_2562846')->references('id')->on('car_park_locations');
        });
    }
}
