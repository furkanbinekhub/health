<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $status = [
            \App\Models\DoctorAppointment::STATUS_ACTIVE,
            \App\Models\DoctorAppointment::STATUS_PENDING,
            \App\Models\DoctorAppointment::STATUS_CANCELLED,
            \App\Models\DoctorAppointment::STATUS_COMPLETE
        ];
        Schema::create('doctor_appointments', function (Blueprint $table) use ($status) {
            $table->id();
            $table->bigIncrements('doctor_id');
            $table->foreign('doctor_id')->references('id')->on('doctors');
            $table->timestamp('appointment_date');
            $table->enum('status', $status)->default(\App\Models\DoctorAppointment::STATUS_PENDING);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctor_appointments');
    }
}
