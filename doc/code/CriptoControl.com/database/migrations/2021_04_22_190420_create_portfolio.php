<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortfolio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portfolio', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("moneda",50);
            $table->double("precio_compra")->default(0);
            $table->double("cantidad")->default(0);
            $table->timestamp('fecha_publicacion')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedBigInteger("usuario_id");
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
        Schema::dropIfExists('portfolio');
    }
}
