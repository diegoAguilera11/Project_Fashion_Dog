<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicituds', function (Blueprint $table) {

            $table->id();
            $table->dateTime('fecha_solicitud');
            $table->enum('estado', ['INGRESADA', 'ATENDIDA A TIEMPO', 'ATENDIDA CON RETRASO', 'ANULADA']);
            $table->string('comentario')->nullable();

            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('estilista_id')->nullable();

            $table->foreign('cliente_id')->references('id')->on('users');
            $table->foreign('estilista_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicituds');
    }
};
