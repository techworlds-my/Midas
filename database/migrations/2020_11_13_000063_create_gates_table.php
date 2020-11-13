<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGatesTable extends Migration
{
    public function up()
    {
        Schema::create('gates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('last_active')->nullable();
            $table->boolean('in_enable')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
