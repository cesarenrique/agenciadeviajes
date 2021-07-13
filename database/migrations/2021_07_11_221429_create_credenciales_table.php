<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCredencialesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credenciales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("tipo");
            $table->string("url");
            $table->integer("cliente")->unsigned();
            $table->string("token");
            $table->longText("accessToken");
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
        Schema::dropIfExists('credenciales');
    }
}
