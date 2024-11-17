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
        Schema::create('reservacions', function (Blueprint $table) {
            $table->id();
            $table->string('asiento');

            $table->integer('total');

            $table->unsignedBigInteger('info_usuarios_id');
            $table->foreign('info_usuarios_id')->references('id')->on('info_usuarios');

            $table->unsignedBigInteger('pelicula_id');
            $table->foreign('pelicula_id')->references('id')->on('peliculas');

            $table->unsignedBigInteger('sala_id');
            $table->foreign('sala_id')->references('id')->on('salas');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservacions');
    }
};
