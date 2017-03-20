<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('user_username', 45);
            $table->integer('client_run');
            $table->date('created_at');
            $table->integer('sale_promotion_id');
            $table->integer('pay');
            $table->integer('sale_state');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sales');
    }
}
