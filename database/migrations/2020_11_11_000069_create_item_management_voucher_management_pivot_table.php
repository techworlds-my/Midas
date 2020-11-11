<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemManagementVoucherManagementPivotTable extends Migration
{
    public function up()
    {
        Schema::create('item_management_voucher_management', function (Blueprint $table) {
            $table->unsignedInteger('voucher_management_id');
            $table->foreign('voucher_management_id', 'voucher_management_id_fk_2562727')->references('id')->on('voucher_managements')->onDelete('cascade');
            $table->unsignedInteger('item_management_id');
            $table->foreign('item_management_id', 'item_management_id_fk_2562727')->references('id')->on('item_managements')->onDelete('cascade');
        });
    }
}
