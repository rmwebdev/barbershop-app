<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToStylistsTable extends Migration
{
    public function up()
    {
        Schema::table('stylists', function (Blueprint $table) {
            $table->unsignedBigInteger('barbershop_id')->nullable();
            $table->foreign('barbershop_id', 'barbershop_fk_5797894')->references('id')->on('barbershops');
        });
    }
}