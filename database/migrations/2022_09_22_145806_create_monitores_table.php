<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonitoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monitores', function (Blueprint $table) {
            $table->id();

            $table->string('marca', 50);
            $table->string('tamanio')->default('19 Pulgadas');
            $table->string('modelo', 50);
            $table->string('serial', 50);
            $table->tinyInteger('estado')->default(1);
            
            $table->unsignedBigInteger('equipamiento_id')->nullable();

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
        Schema::dropIfExists('monitores');
    }
}
