<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToRewardListsTable extends Migration
{
    public function up()
    {
        Schema::table('reward_lists', function (Blueprint $table) {
            $table->unsignedInteger('username_id')->nullable();
            $table->foreign('username_id', 'username_fk_2562781')->references('id')->on('users');
            $table->unsignedInteger('reward_id');
            $table->foreign('reward_id', 'reward_fk_2562782')->references('id')->on('reward_managements');
        });
    }
}
