<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToRewardManagementsTable extends Migration
{
    public function up()
    {
        Schema::table('reward_managements', function (Blueprint $table) {
            $table->unsignedInteger('category_id');
            $table->foreign('category_id', 'category_fk_2562747')->references('id')->on('reward_catogeries');
        });
    }
}
