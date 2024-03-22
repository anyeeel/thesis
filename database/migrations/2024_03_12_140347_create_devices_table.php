<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevicesTable extends Migration
{
    public function up()
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('room_id');
            $table->string('name');
            $table->string('type');
            $table->integer('quantity');
            $table->string('brand');
            $table->string('model');
            $table->date('installed_date');
            $table->integer('life_expectancy'); // in years
            $table->integer('power'); // in watts
            $table->integer('hours_used'); // in hours
            $table->float('energy')->virtualAs('quantity * power * hours_used / 1000'); // in kWh
            $table->timestamps();

            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('devices');
    }
}