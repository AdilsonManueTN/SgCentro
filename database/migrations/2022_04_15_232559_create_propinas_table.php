<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propinas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('turma_id');
            $table->string('morada')->nullable();
            $table->text('arquivo1');
            $table->foreignId('user_id');
            $table->enum('tipo',['Único','Mensal','Parcelado','Trimestral','Semestral','Anual','Por Aula'])->nullable();
            $table->foreign('turma_id')->references('turmas')->onDelete('cascade');
            $table->foreign('user_id')->references('users')->onDelete('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('propinas');
    }
}
