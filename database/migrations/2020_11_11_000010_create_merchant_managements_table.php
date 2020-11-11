<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchantManagementsTable extends Migration
{
    public function up()
    {
        Schema::create('merchant_managements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_name');
            $table->string('ssm')->nullable();
            $table->string('address');
            $table->string('postcode')->nullable();
            $table->string('in_charge_person');
            $table->string('contact');
            $table->string('email');
            $table->string('position');
            $table->string('website')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('merchant')->nullable();
            $table->string('merchant_admin')->nullable();
            $table->string('merchant_manager')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
