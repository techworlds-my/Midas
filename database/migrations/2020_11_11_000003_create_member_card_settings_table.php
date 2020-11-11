<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberCardSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('member_card_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company');
            $table->string('format');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
