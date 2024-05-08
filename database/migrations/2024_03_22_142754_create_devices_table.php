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
            $table->integer('active_quantity')->default(0); // Adding active_quantity column
            $table->integer('inactive_quantity')->default(0); // Adding inactive_quantity column
            $table->string('brand');
            $table->string('model');
            $table->date('installed_date')->nullable();
            $table->integer('life_expectancy')->nullable(); // in years
            $table->decimal('power', 10, 4); // in watts, with a total of 10 digits and 2 decimal places
            $table->decimal('hours_used', 10, 4); // in hours, with a total of 10 digits and 2 decimal places
            $table->decimal('energy', 10, 4)->virtualAs('active_quantity * power * hours_used / 1000'); // in kWh, with a total of 10 digits and 2 decimal places
            $table->timestamps();

            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('devices');
    }
}
