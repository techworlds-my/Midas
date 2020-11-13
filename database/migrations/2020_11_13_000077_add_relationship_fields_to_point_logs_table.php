<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPointLogsTable extends Migration
{
    public function up()
    {
        Schema::table('point_logs', function (Blueprint $table) {
            $table->unsignedInteger('username_id');
            $table->foreign('username_id', 'username_fk_2562789')->references('id')->on('users');
            $table->unsignedInteger('title_id');
            $table->foreign('title_id', 'title_fk_2562790')->references('id')->on('point_conditions');
        });
    }
}
