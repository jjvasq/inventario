<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCpusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cpus', function (Blueprint $table) {
            $table->id();

            $table->string('macaddress', 100);
            $table->string('procesador', 100);
            $table->string('ram_modelo', 50)->default('DDR 4');
            $table->string('patrimonial', 50)->nullable();
            $table->tinyInteger('ram_cant_gb')->default(8);
            $table->string('sistema_operativo', 50)->default('Windows 10');
            $table->string('descripción', 255)->nullable();
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
        Schema::dropIfExists('cpus');
    }
}
