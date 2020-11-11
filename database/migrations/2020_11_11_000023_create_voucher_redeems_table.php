<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoucherRedeemsTable extends Migration
{
    public function up()
    {
        Schema::create('voucher_redeems', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->nullable();
            $table->string('merchant')->nullable();
            $table->string('date')->nullable();
            $table->string('amount')->nullable();
            $table->string('type')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
