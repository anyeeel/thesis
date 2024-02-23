<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('floor_number');
            $table->string('device_name');
            $table->string('type');
            $table->integer('quantity');
            $table->boolean('inactive');
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->date('date_installed');
            $table->integer('life_expectancy');
            $table->float('power');
            $table->integer('hours_used')->nullable();
            $table->float('energy_kwh')->nullable();
            $table->timestamps();
            $table->foreign('floor_id')->references('id')->on('floors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
