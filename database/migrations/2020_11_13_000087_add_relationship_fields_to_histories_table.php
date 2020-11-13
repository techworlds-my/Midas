<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToHistoriesTable extends Migration
{
    public function up()
    {
        Schema::table('histories', function (Blueprint $table) {
            $table->unsignedInteger('username_id');
            $table->foreign('username_id', 'username_fk_2562451')->references('id')->on('users');
            $table->unsignedInteger('gate_id');
            $table->foreign('gate_id', 'gate_fk_2562452')->references('id')->on('gates');
        });
    }
}
