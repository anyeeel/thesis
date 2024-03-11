<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFloorTable extends Migration
{
    public function up()
    {
        Schema::create('floor', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('building_id'); // Add the building_id column
            $table->string('name');
            $table->timestamps();
            
            // Add foreign key constraint
            $table->foreign('building_id')->references('id')->on('buildings')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('floor');
    }
}
