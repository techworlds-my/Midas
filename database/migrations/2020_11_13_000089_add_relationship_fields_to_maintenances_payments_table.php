<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMaintenancesPaymentsTable extends Migration
{
    public function up()
    {
        Schema::table('maintenances_payments', function (Blueprint $table) {
            $table->unsignedInteger('username_id');
            $table->foreign('username_id', 'username_fk_2562500')->references('id')->on('users');
            $table->unsignedInteger('payment_method_id');
            $table->foreign('payment_method_id', 'payment_method_fk_2562508')->references('id')->on('payment_methods');
        });
    }
}
