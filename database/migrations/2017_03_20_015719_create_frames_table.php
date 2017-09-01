<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFramesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frames', function (Blueprint $table) {
            $table->integer('id');
            $table->string('name', 45);
            $table->integer('model_id');
            $table->integer('color_id');
            $table->integer('for_type_id');
            $table->integer('age_type_id');
            $table->integer('stock');
            $table->integer('cost_price');
            $table->integer('price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('frames');
    }
}
