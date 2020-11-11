<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePointLogsTable extends Migration
{
    public function up()
    {
        Schema::create('point_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('point_gain');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
