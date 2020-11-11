<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventControlRolePivotTable extends Migration
{
    public function up()
    {
        Schema::create('event_control_role', function (Blueprint $table) {
            $table->unsignedInteger('event_control_id');
            $table->foreign('event_control_id', 'event_control_id_fk_2562541')->references('id')->on('event_controls')->onDelete('cascade');
            $table->unsignedInteger('role_id');
            $table->foreign('role_id', 'role_id_fk_2562541')->references('id')->on('roles')->onDelete('cascade');
        });
    }
}
