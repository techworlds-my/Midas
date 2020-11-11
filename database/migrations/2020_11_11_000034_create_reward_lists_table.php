<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRewardListsTable extends Migration
{
    public function up()
    {
        Schema::create('reward_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reward_type');
            $table->integer('amount');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
