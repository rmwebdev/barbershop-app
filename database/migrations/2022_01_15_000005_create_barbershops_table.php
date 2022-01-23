<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarbershopsTable extends Migration
{
    public function up()
    {
        Schema::create('barbershops', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('name')->unique();
                $table->string('slug')->unique();
                $table->longText('address');
                $table->string('phone')->nullable();
                $table->longText('about_barber')->nullable();
                $table->timestamps();
        });
    }
}