<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToVoucherRedeemsTable extends Migration
{
    public function up()
    {
        Schema::table('voucher_redeems', function (Blueprint $table) {
            $table->unsignedInteger('vouchercode_id');
            $table->foreign('vouchercode_id', 'vouchercode_fk_2562874')->references('id')->on('voucher_managements');
        });
    }
}
