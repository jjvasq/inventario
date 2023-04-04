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
        Schema::create('imagenes_conmutador', function (Blueprint $table) {
            $table->id();

            $table->string('url');

            $table->unsignedBigInteger('conmutador_id');

            $table->foreign('conmutador_id')->references('id')->on('conmutadores')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('imagenes_conmutador');
    }
};
