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
        Schema::create('objetos_actividades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('objeto_id');
            $table->unsignedBigInteger('actividad_id');
            $table->timestamps();

            $table->foreign('objeto_id')->references('id')->on('objetos')->onDelete('cascade');
            $table->foreign('actividad_id')->references('id')->on('actividades')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('objetos_actividades');
    }
};
