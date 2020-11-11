<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePointSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('point_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('point_ratio');
            $table->boolean('is_enable')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
