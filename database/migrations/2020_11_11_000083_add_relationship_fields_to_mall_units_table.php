<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMallUnitsTable extends Migration
{
    public function up()
    {
        Schema::table('mall_units', function (Blueprint $table) {
            $table->unsignedInteger('merchant_id')->nullable();
            $table->foreign('merchant_id', 'merchant_fk_2562866')->references('id')->on('merchant_managements');
        });
    }
}
