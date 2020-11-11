<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToUnitManagementsTable extends Migration
{
    public function up()
    {
        Schema::table('unit_managements', function (Blueprint $table) {
            $table->unsignedInteger('unit_id');
            $table->foreign('unit_id', 'unit_fk_2562399')->references('id')->on('add_units');
            $table->unsignedInteger('owner_id');
            $table->foreign('owner_id', 'owner_fk_2562400')->references('id')->on('users');
        });
    }
}
