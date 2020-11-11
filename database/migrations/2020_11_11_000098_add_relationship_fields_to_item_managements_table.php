<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToItemManagementsTable extends Migration
{
    public function up()
    {
        Schema::table('item_managements', function (Blueprint $table) {
            $table->unsignedInteger('category_id');
            $table->foreign('category_id', 'category_fk_2562646')->references('id')->on('item_cateogries');
            $table->unsignedInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_2562661')->references('id')->on('users');
            $table->unsignedInteger('merchant_id')->nullable();
            $table->foreign('merchant_id', 'merchant_fk_2562662')->references('id')->on('merchant_managements');
        });
    }
}
