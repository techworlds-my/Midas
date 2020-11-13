<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoucherCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('voucher_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cateogry');
            $table->boolean('in_enable')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
