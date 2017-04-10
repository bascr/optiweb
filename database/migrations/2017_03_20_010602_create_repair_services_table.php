<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepairServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repair_services', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('client_run');
            $table->integer('workshop_id');
            $table->dateTime('created_at');
            $table->integer('state');
            $table->dateTime('delivery_state');
            $table->integer('pay');
            $table->integer('price');
            $table->string('observation', 500);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('repair_services');
    }
}
