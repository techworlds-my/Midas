<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToOrderManagementsTable extends Migration
{
    public function up()
    {
        Schema::table('order_managements', function (Blueprint $table) {
            $table->unsignedInteger('status_id');
            $table->foreign('status_id', 'status_fk_2562697')->references('id')->on('order_statuses');
            $table->unsignedInteger('username_id');
            $table->foreign('username_id', 'username_fk_2562698')->references('id')->on('users');
            $table->unsignedInteger('paymentmethod_id');
            $table->foreign('paymentmethod_id', 'paymentmethod_fk_2562705')->references('id')->on('payment_methods');
        });
    }
}
