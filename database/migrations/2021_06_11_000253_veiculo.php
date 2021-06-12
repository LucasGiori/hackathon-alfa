<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Veiculo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('veiculo', function (Blueprint $table) {
            $table->id();
            $table->string('modelo',50)->unique();
            $table->year('anomodelo');
            $table->year('anofabricacao');
            $table->float('valor');
            $table->enum('tipo',['NOVO','SEMINOVO']);
            $table->string('fotoDestaque',50);
            $table->foreignId('marca_id');
            $table->foreignId('cor_id');
            $table->foreignId('usuario_id');
            $table->text('opcionais');
            $table->timestamps();

            $table->foreign('marca_id')->references('id')->on('marca');
            $table->foreign('cor_id')->references('id')->on('cor');
            $table->foreign('usuario_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
