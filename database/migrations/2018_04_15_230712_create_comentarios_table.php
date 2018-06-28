<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentarios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('usuario_id')->unsigned();
            $table->integer('blog_id')->unsigned();
            $table->string('comentario');
            $table->date('fecha');
            $table->string('estado',20);

            $table->foreign('blog_id')
                ->references('id')->on('blog')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');


            $table->foreign('usuario_id')
                ->references('id')->on('usuarios')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

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
        Schema::dropIfExists('comentarios');
    }
}
