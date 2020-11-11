<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddonManagementsTable extends Migration
{
    public function up()
    {
        Schema::create('addon_managements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('price');
            $table->boolean('is_enable')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
