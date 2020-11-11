<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMembeCardManagementsTable extends Migration
{
    public function up()
    {
        Schema::table('membe_card_managements', function (Blueprint $table) {
            $table->unsignedInteger('user_name_id');
            $table->foreign('user_name_id', 'user_name_fk_2562576')->references('id')->on('users');
        });
    }
}
