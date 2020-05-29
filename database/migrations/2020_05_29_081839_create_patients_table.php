<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id('patient_id');
            $table->string('name', 100);
            $table->string('lastname', 255);
            $table->string('address', 255);
            $table->string('district', 255);
            $table->string('reference', 255);
            $table->unsignedInteger('priority');
            $table->string('doctor', 255);
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->unsignedBigInteger('user_delivery_id');
            $table->foreign('user_delivery_id')->references('user_delivery_id')->on('users_delivery');
            $table->unsignedBigInteger('state_patient_id');
            $table->foreign('state_patient_id')->references('state_patient_id')->on('states_patient');
            $table->unsignedBigInteger('type_patient_id');
            $table->foreign('type_patient_id')->references('type_patient_id')->on('types_patient');
            $table->unsignedInteger('oa');
            $table->string('insurance', 255); 
            $table->unsignedInteger('cellphone');
            $table->unsignedInteger('state');
            $table->timestamps(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
