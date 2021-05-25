<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTarefasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarefas', function (Blueprint $table) {
            $table->id();
            $table->string('atividade');
            $table->text('observacao');
            $table->bigInteger('fkIntegrante')->unsigned();
            $table->bigInteger('fkData')->unsigned();
            $table->bigInteger('fkStatus')->unsigned();

            $table->foreign('fkIntegrante')->references('id')->on('integrantes'); 
            $table->foreign('fkData')->references('id')->on('datas'); 
            $table->foreign('fkStatus')->references('id')->on('status'); 
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
        Schema::dropIfExists('tarefas');
    }
}
