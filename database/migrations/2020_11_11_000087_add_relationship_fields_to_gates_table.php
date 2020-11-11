<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToGatesTable extends Migration
{
    public function up()
    {
        Schema::table('gates', function (Blueprint $table) {
            $table->unsignedInteger('location_id');
            $table->foreign('location_id', 'location_fk_2562448')->references('id')->on('locations');
        });
    }
}
