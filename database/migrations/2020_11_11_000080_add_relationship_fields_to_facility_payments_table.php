<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToFacilityPaymentsTable extends Migration
{
    public function up()
    {
        Schema::table('facility_payments', function (Blueprint $table) {
            $table->unsignedInteger('facility_id');
            $table->foreign('facility_id', 'facility_fk_2562510')->references('id')->on('facility_managements');
            $table->unsignedInteger('username_id');
            $table->foreign('username_id', 'username_fk_2562511')->references('id')->on('users');
            $table->unsignedInteger('payment_method_id');
            $table->foreign('payment_method_id', 'payment_method_fk_2562513')->references('id')->on('payment_methods');
        });
    }
}
