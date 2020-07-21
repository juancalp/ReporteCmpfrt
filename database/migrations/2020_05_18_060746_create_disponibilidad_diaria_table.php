<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisponibilidadDiariaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disponibilidad_diaria', function (Blueprint $table) {
            
            $table->id();
            $table->decimal('time_runnig',18, 2)->nullable();
            $table->decimal('time_stopped',8, 2)->nullable();
            $table->integer('id_disponibilidad');
            $table->timestamp('fecha',4);
            $table->timestamps(4);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('disponibilidad_diaria');
    }
}
