<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToVehicleModelsTable extends Migration
{
    public function up()
    {
        Schema::table('vehicle_models', function (Blueprint $table) {
            $table->unsignedInteger('brand_id')->nullable();
            $table->foreign('brand_id', 'brand_fk_2562820')->references('id')->on('vehicle_brands');
        });
    }
}
