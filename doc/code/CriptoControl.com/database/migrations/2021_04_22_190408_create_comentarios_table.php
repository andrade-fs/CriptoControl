<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->timestamps();
            $table->text("comentario",300);
            $table->text("usuario_nombre",100);
            $table->unsignedBigInteger("post_id");
            $table->unsignedBigInteger("usuario_id");
            $table->foreign("post_id")->references("id")->on("posts")->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("usuario_id")->references("id")->on("users")->onUpdate("cascade")->onDelete("cascade");    

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
