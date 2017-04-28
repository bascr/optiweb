<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->integer('run')->primary();
            $table->char('digit');
            $table->string('name', 45);
            $table->string('last_name', 45);
            $table->string('second_last_name', 45);
            $table->dateTime('birth_date');
            $table->string('address', 255);
            $table->integer('district_id');
            $table->integer('phone');
            $table->string('email')->unique();
            $table->dateTime('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('clients');
    }
}
