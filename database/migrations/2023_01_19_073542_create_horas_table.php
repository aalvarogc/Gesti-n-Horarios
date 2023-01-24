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
        Schema::create('horas', function (Blueprint $table) {
            $table->integer('diaH');
            $table->integer('horaH');
            $table->unsignedBigInteger('codAs');
            $table->foreign('codAs')
            ->references('codAs')->on('asignaturas')
            ->onDelete('cascade');
            $table->primary(['diaH', 'horaH', 'codAs']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('horas');
    }
};
