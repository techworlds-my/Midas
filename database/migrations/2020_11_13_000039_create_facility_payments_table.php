<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacilityPaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('facility_payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('amount');
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
