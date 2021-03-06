<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('username')->primary();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->integer('run');
            $table->integer('digit');
            $table->string('name', 45);
            $table->string('last_name', 45);
            $table->string('second_last_name', 45);
            $table->string('address', 255);
            $table->integer('district_id');
            $table->integer('phone');
            $table->string('email')->unique();
            $table->string('user_image', 255);
            $table->integer('contract_state');
            $table->integer('base_wage');
            $table->integer('overtime_value');
            $table->integer('user_type_id');
            $table->integer('branch_office_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
