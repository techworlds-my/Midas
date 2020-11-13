<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMerchantSubCategoriesTable extends Migration
{
    public function up()
    {
        Schema::table('merchant_sub_categories', function (Blueprint $table) {
            $table->unsignedInteger('cateogry_id')->nullable();
            $table->foreign('cateogry_id', 'cateogry_fk_2562593')->references('id')->on('merchant_categories');
        });
    }
}
