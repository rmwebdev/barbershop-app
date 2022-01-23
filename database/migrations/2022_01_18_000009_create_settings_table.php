<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('web_name');
            $table->string('email')->nullable();
            $table->longText('address')->nullable();
            $table->string('tag_line');
            $table->string('phone')->nullable();
            $table->string('open_hours');
            $table->longText('about_web')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkind')->nullable();
            $table->string('twitter')->nullable();
            $table->longText('paragraf_tag_line')->nullable();
            $table->timestamps();
        });
    }
}