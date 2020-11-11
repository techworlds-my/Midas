<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToVoucherManagementsTable extends Migration
{
    public function up()
    {
        Schema::table('voucher_managements', function (Blueprint $table) {
            $table->unsignedInteger('merchant_id');
            $table->foreign('merchant_id', 'merchant_fk_2562719')->references('id')->on('merchant_managements');
            $table->unsignedInteger('item_category_id')->nullable();
            $table->foreign('item_category_id', 'item_category_fk_2562726')->references('id')->on('item_cateogries');
        });
    }
}
