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
            $table->enum('estado', ['ingresa', 'atendida a tiempo', 'atendida con retraso', 'anulada']);
            $table->string('comentario')->nullable();






            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
