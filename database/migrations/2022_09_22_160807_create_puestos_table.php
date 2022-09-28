<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePuestosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puestos', function (Blueprint $table) {
            $table->id();

            $table->string('nombre', 50);
            $table->string('slug', 50);
            $table->string('descripcion', 255)->nullable();
            $table->tinyInteger('estado')->default(1);
            $table->string('referencia_lugar', 50)->nullable();
            $table->date('fecha_limpieza');

            $table->unsignedBigInteger('sector_id')->nullable();
            $table->unsignedBigInteger('conexion_id')->nullable();
            $table->unsignedBigInteger('equipamiento_id')->nullable();

            $table->foreign('sector_id')->references('id')->on('sectores')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('conexion_id')->references('id')->on('conexiones')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('equipamiento_id')->references('id')->on('equipamientos')->onDelete('set null')->onUpdate('cascade');

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
        Schema::dropIfExists('puestos');
    }
}
