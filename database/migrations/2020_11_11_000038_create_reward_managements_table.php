<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRewardManagementsTable extends Migration
{
    public function up()
    {
        Schema::create('reward_managements', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('expired');
            $table->string('title');
            $table->integer('top_up_amount')->nullable();
            $table->integer('purchase_amount')->nullable();
            $table->string('referral_amount')->nullable();
            $table->integer('bonus')->nullable();
            $table->string('point')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
