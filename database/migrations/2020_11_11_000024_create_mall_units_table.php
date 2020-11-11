<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMallUnitsTable extends Migration
{
    public function up()
    {
        Schema::create('mall_units', function (Blueprint $table) {
            $table->increments('id');
            $table->string('unit_no');
            $table->string('floor');
            $table->string('size');
            $table->string('status');
            $table->string('rental');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
