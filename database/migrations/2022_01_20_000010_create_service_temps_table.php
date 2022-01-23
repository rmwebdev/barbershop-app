<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceTempsTable extends Migration
{
    public function up()
    {
        Schema::create('service_temps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('ids');
            $table->string('order_code');
            $table->decimal('price', 15, 2);
            $table->string('service_name');
            $table->timestamps();
        });
    }
}