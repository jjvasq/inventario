<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImpresorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('impresoras', function (Blueprint $table) {
            $table->id();

            $table->string('nombre', 50);
            $table->string('slug', 50);
            $table->string('descripcion', 255);
            $table->string('modelo', 45)->nullable();
            $table->string('serial', 255)->nullable();
            $table->tinyInteger('estado')->default(1);
            $table->string('patrimonial', 50)->nullable();

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
        Schema::dropIfExists('impresoras');
    }
}
