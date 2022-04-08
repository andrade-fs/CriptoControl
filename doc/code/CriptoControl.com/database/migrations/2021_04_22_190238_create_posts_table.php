<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("titulo",250);
            $table->string("subtitulo",250);
            $table->string("votos",250)->default(0);
            $table->text("contenido",2000);
            $table->string("foto")->nullable();
            $table->timestamp('fecha_publicacion')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedBigInteger("usuario_id");
            $table->unsignedBigInteger("categoria_id");
            $table->foreign("usuario_id")->references("id")->on("users")->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("categoria_id")->references("id")->on("categorias")->onUpdate("cascade")->onDelete("cascade");


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
