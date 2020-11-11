<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToFacilityBooksTable extends Migration
{
    public function up()
    {
        Schema::table('facility_books', function (Blueprint $table) {
            $table->unsignedInteger('facility_id');
            $table->foreign('facility_id', 'facility_fk_2562422')->references('id')->on('facility_managements');
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_2562425')->references('id')->on('users');
        });
    }
}
