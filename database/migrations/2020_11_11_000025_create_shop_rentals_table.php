<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopRentalsTable extends Migration
{
    public function up()
    {
        Schema::create('shop_rentals', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->integer('amount');
            $table->string('status');
            $table->string('payment_method')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
