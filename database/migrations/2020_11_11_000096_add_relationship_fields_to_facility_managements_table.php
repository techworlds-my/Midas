<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToFacilityManagementsTable extends Migration
{
    public function up()
    {
        Schema::table('facility_managements', function (Blueprint $table) {
            $table->unsignedInteger('category_id');
            $table->foreign('category_id', 'category_fk_2562413')->references('id')->on('facility_categories');
        });
    }
}
