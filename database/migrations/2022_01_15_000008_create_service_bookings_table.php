<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceBookingsTable extends Migration
{
    public function up()
    {
        Schema::create('service_bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->longText('address');
            $table->datetime('time_book');
            $table->decimal('total_price', 15, 2)->nullable();
            $table->longText('notes')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }
}