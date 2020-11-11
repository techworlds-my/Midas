<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMembershipManagementsTable extends Migration
{
    public function up()
    {
        Schema::table('membership_managements', function (Blueprint $table) {
            $table->unsignedInteger('user_name_id');
            $table->foreign('user_name_id', 'user_name_fk_2562581')->references('id')->on('users');
        });
    }
}
