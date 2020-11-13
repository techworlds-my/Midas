<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToShopRentalsTable extends Migration
{
    public function up()
    {
        Schema::table('shop_rentals', function (Blueprint $table) {
            $table->unsignedInteger('merchant_id');
            $table->foreign('merchant_id', 'merchant_fk_2562855')->references('id')->on('merchant_managements');
        });
    }
}
