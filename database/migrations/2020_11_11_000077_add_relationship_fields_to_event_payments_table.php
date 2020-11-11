<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToEventPaymentsTable extends Migration
{
    public function up()
    {
        Schema::table('event_payments', function (Blueprint $table) {
            $table->unsignedInteger('username_id');
            $table->foreign('username_id', 'username_fk_2562837')->references('id')->on('users');
            $table->unsignedInteger('event_id');
            $table->foreign('event_id', 'event_fk_2562838')->references('id')->on('event_controls');
        });
    }
}
