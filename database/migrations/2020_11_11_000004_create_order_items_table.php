<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order');
            $table->string('item');
            $table->integer('quantity');
            $table->integer('price');
            $table->string('add_on')->nullable();
            $table->string('add_on_price')->nullable();
            $table->string('sub_total');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
