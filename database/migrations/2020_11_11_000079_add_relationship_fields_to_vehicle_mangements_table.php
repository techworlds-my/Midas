<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToVehicleMangementsTable extends Migration
{
    public function up()
    {
        Schema::table('vehicle_mangements', function (Blueprint $table) {
            $table->unsignedInteger('username_id');
            $table->foreign('username_id', 'username_fk_2562802')->references('id')->on('users');
            $table->unsignedInteger('brand_id')->nullable();
            $table->foreign('brand_id', 'brand_fk_2562808')->references('id')->on('vehicle_brands');
        });
    }
}
