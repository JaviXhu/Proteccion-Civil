<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('coches_actividades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('coche_id');
            $table->unsignedBigInteger('actividad_id');
            $table->timestamps();

            $table->foreign('coche_id')->references('id')->on('coches')->onDelete('cascade');
            $table->foreign('actividad_id')->references('id')->on('actividades')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coches_actividades');
    }
};
