<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToVoucherWalletsTable extends Migration
{
    public function up()
    {
        Schema::table('voucher_wallets', function (Blueprint $table) {
            $table->unsignedInteger('username_id')->nullable();
            $table->foreign('username_id', 'username_fk_2562773')->references('id')->on('users');
            $table->unsignedInteger('voucher_id')->nullable();
            $table->foreign('voucher_id', 'voucher_fk_2562775')->references('id')->on('voucher_managements');
        });
    }
}
