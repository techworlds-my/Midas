<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToRewardManagementsTable extends Migration
{
    public function up()
    {
        Schema::table('reward_managements', function (Blueprint $table) {
            $table->unsignedInteger('merchant_id');
            $table->foreign('merchant_id', 'merchant_fk_2562746')->references('id')->on('merchant_managements');
            $table->unsignedInteger('category_id');
            $table->foreign('category_id', 'category_fk_2562747')->references('id')->on('reward_catogeries');
            $table->unsignedInteger('voucher_id')->nullable();
            $table->foreign('voucher_id', 'voucher_fk_2562755')->references('id')->on('voucher_managements');
        });
    }
}
