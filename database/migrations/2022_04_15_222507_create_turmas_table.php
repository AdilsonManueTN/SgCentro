<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTurmasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turmas', function (Blueprint $table) {
            $table->id();
            $table->string('turma');
            $table->string('certificado_preco')->nullable();
            $table->string('carga_horaria')->nullable();
            $table->string('duracao')->nullable();
            $table->enum('turno',['Manhã','Tarde','Noite'])->nullable();
            $table->dateTime('data_inicio')->nullable();
            $table->dateTime('data_fim')->nullable();
            $table->time('horario')->nullable();
            $table->decimal('preco_inscricao_turma', $precision = 8, $scale = 2);
            $table->foreignId('curso_id');
            $table->foreignId('sala_id');
            $table->foreignId('user_id');
            $table->foreign('sala_id')->references('id')->on('salas')->constrained()->onDelete('cascade');
            $table->foreign('curso_id')->references('id')->on('cursos')->constrained()->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('turmas');
    }
}
