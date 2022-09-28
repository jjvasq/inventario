<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConmutadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conmutadores', function (Blueprint $table) {
            $table->id();

            $table->tinyInteger('numero');
            $table->string('marca', 50);
            $table->string('descripcion', 255)->nullable();
            $table->string('referencia_lugar', 50);
            $table->date('fecha_limpieza');

            $table->unsignedBigInteger('rack_id')->nullable();
            $table->unsignedBigInteger('sector_id')->nullable();

            $table->foreign('rack_id')->references('id')->on('racks')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('sector_id')->references('id')->on('sectores')->onDelete('set null')->onUpdate('cascade');

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
        Schema::dropIfExists('conmutadores');
    }
}
