<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalePromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_promotions', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name', 45);
            $table->string('description', 255);
            $table->integer('state');
            $table->integer('discount');
            $table->dateTime('created_at');
            $table->dateTime('valid_until');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sale_promotions');
    }
}
