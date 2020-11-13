<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchantLevelOrderTypePivotTable extends Migration
{
    public function up()
    {
        Schema::create('merchant_level_order_type', function (Blueprint $table) {
            $table->unsignedInteger('merchant_level_id');
            $table->foreign('merchant_level_id', 'merchant_level_id_fk_2562611')->references('id')->on('merchant_levels')->onDelete('cascade');
            $table->unsignedInteger('order_type_id');
            $table->foreign('order_type_id', 'order_type_id_fk_2562611')->references('id')->on('order_types')->onDelete('cascade');
        });
    }
}
