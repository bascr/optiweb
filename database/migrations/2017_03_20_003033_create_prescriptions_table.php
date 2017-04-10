<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('client_run');
            $table->string('far_right_eye_sphere', 6);
            $table->string('far_right_eye_cyl', 6);
            $table->string('far_right_eye_axis', 6);
            $table->string('far_right_eye_prism', 6);
            $table->string('far_right_eye_base', 6);
            $table->string('far_right_eye_pd', 6);
            $table->string('far_left_eye_sphere', 6);
            $table->string('far_left_eye_cyl', 6);
            $table->string('far_left_eye_axis', 6);
            $table->string('far_left_eye_prism', 6);
            $table->string('far_left_eye_base', 6);
            $table->string('far_left_eye_pd', 6);
            $table->string('near_right_eye_sphere', 6);
            $table->string('near_right_eye_cyl', 6);
            $table->string('near_right_eye_axis', 6);
            $table->string('near_right_eye_prism', 6);
            $table->string('near_right_eye_base', 6);
            $table->string('near_right_eye_pd', 6);
            $table->string('near_left_eye_sphere', 6);
            $table->string('near_left_eye_cyl', 6);
            $table->string('near_left_eye_axis', 6);
            $table->string('near_left_eye_prism', 6);
            $table->string('near_left_eye_base', 6);
            $table->string('near_left_eye_pd', 6);
            $table->string('doctor_name', 100);
            $table->dateTime('created_at');
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
        Schema::drop('prescriptions');
    }
}
