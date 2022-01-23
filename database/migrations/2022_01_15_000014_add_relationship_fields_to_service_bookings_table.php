<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToServiceBookingsTable extends Migration
{
    public function up()
    {
        Schema::table('service_bookings', function (Blueprint $table) {
            $table->unsignedBigInteger('stylist_id')->nullable();
            $table->foreign('stylist_id', 'stylist_fk_5797884')->references('id')->on('stylists');
            $table->unsignedBigInteger('barbershop_id')->nullable();
            $table->foreign('barbershop_id', 'barbershop_fk_5797886')->references('id')->on('barbershops');
        });
    }
}