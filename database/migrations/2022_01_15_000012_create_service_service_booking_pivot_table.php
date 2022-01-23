<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceServiceBookingPivotTable extends Migration
{
    public function up()
    {
        Schema::create('service_service_booking', function (Blueprint $table) {
            $table->unsignedBigInteger('service_booking_id');
            $table->foreign('service_booking_id', 'service_booking_id_fk_5797885')->references('id')->on('service_bookings')->onDelete('cascade');
            $table->unsignedBigInteger('service_id');
            $table->foreign('service_id', 'service_id_fk_5797885')->references('id')->on('services')->onDelete('cascade');
        });
    }
}