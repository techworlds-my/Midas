<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAddVisitorsTable extends Migration
{
    public function up()
    {
        Schema::table('add_visitors', function (Blueprint $table) {
            $table->unsignedInteger('username_id');
            $table->foreign('username_id', 'username_fk_2562430')->references('id')->on('users');
            $table->unsignedInteger('add_by_id')->nullable();
            $table->foreign('add_by_id', 'add_by_fk_2562431')->references('id')->on('users');
        });
    }
}
