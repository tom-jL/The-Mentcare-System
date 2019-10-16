<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientPrescriptionPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_prescription', function (Blueprint $table) {
            $table->unsignedInteger('patient_id');

            $table->foreign('patient_id', 'patient_id_fk_360922')->references('id')->on('patients')->onDelete('cascade');

            $table->unsignedInteger('prescription_id');

            $table->foreign('prescription_id', 'prescription_id_fk_360922')->references('id')->on('services')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patient_prescription');
    }
}
