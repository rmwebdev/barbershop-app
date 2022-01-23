<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarbershopServicePivotTable extends Migration
{
    public function up()
    {
        Schema::create('barbershop_service', function (Blueprint $table) {
            $table->unsignedBigInteger('barbershop_id');
            $table->foreign('barbershop_id', 'barbershop_id_fk_5797893')->references('id')->on('barbershops')->onDelete('cascade');
            $table->unsignedBigInteger('service_id');
            $table->foreign('service_id', 'service_id_fk_5797893')->references('id')->on('services')->onDelete('cascade');
        });
    }
}