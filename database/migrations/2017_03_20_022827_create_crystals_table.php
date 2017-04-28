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
            $table->integer('diopter_range_id');
            $table->integer('material_id');
            $table->integer('focus_id');
            $table->integer('crystal_treatment_id');
            $table->integer('crystal_type_id');
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
        Schema::drop('crystals');
    }
}
