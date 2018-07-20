<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLugarTuristicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lugar_turisticos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('nombre_es');
            $table->string('longitud');
            $table->string('latitud');
            $table->text('descripcion');
            $table->text('descripcion_es');
            $table->string('estado',20);
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
        Schema::dropIfExists('lugar_turisticos');
    }
}
