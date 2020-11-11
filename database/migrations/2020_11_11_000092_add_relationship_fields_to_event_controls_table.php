<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToEventControlsTable extends Migration
{
    public function up()
    {
        Schema::table('event_controls', function (Blueprint $table) {
            $table->unsignedInteger('category_id');
            $table->foreign('category_id', 'category_fk_2562538')->references('id')->on('event_categories');
        });
    }
}
