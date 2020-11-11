<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoucherManagementsTable extends Migration
{
    public function up()
    {
        Schema::create('voucher_managements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('vouchercode');
            $table->string('discount_type');
            $table->integer('value');
            $table->integer('min_spend')->nullable();
            $table->integer('max_spend')->nullable();
            $table->boolean('excluded_sales_item')->default(0)->nullable();
            $table->integer('usage_limit')->nullable();
            $table->integer('limit_item')->nullable();
            $table->integer('limit_per_user')->nullable();
            $table->datetime('expired');
            $table->string('description');
            $table->boolean('is_free_shipping')->default(0)->nullable();
            $table->boolean('is_credit_purchase')->default(0)->nullable();
            $table->string('redeem_point')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
