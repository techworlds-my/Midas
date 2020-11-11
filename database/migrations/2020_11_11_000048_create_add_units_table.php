<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddUnitsTable extends Migration
{
    public function up()
    {
        Schema::create('add_units', function (Blueprint $table) {
            $table->increments('id');
            $table->string('unit');
            $table->integer('floor');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
