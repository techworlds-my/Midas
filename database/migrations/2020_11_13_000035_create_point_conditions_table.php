<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePointConditionsTable extends Migration
{
    public function up()
    {
        Schema::create('point_conditions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->boolean('is_enable')->default(0);
            $table->integer('point_add');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
