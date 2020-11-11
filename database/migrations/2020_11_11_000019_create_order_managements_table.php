<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderManagementsTable extends Migration
{
    public function up()
    {
        Schema::create('order_managements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order')->nullable();
            $table->string('voucher')->nullable();
            $table->string('address');
            $table->decimal('price', 15, 2);
            $table->decimal('delivery_charge', 15, 2)->nullable();
            $table->string('tax')->nullable();
            $table->decimal('total', 15, 2)->nullable();
            $table->string('comment')->nullable();
            $table->string('merchant');
            $table->string('transaction')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
