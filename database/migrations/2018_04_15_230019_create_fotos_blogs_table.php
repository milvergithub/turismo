<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFotosBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fotos_blog', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('foto_id')->unsigned();
            $table->integer('blog_id')->unsigned();
            $table->foreign('foto_id')
                ->references('id')->on('fotos')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table->foreign('blog_id')
                ->references('id')->on('blog')
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
        Schema::dropIfExists('fotos_blog');
    }
}
