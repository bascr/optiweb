<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCrystalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crystals', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('diopter_first_value');
            $table->integer('diopter_second_value');
            $table->integer('material_id');
            $table->integer('focus_id');
            $table->integer('crystal_treatment_id');
            $table->integer('crystal_type');
            $table->integer('price');
            $table->integer('laboratory_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('crystals');
    }
}
