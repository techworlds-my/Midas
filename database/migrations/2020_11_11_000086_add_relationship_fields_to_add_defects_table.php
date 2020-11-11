<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAddDefectsTable extends Migration
{
    public function up()
    {
        Schema::table('add_defects', function (Blueprint $table) {
            $table->unsignedInteger('username_id');
            $table->foreign('username_id', 'username_fk_2562479')->references('id')->on('users');
            $table->unsignedInteger('category_id');
            $table->foreign('category_id', 'category_fk_2562488')->references('id')->on('defect_categories');
            $table->unsignedInteger('status_id');
            $table->foreign('status_id', 'status_fk_2562489')->references('id')->on('status_controls');
            $table->unsignedInteger('inchargeperson_id')->nullable();
            $table->foreign('inchargeperson_id', 'inchargeperson_fk_2562490')->references('id')->on('users');
        });
    }
}
