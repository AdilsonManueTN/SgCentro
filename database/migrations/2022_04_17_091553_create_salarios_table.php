<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('categoria_id');
            $table->decimal('salario_bruto',$precision = 8, $scale = 2);
            $table->decimal('salario_liquido',$precision = 8, $scale = 2);
            $table->decimal('salario_base',$precision = 8, $scale = 2);
            $table->integer('percentagem');
            $table->decimal('total');
            $table->foreign('categoria_id')->references('id')->on('categorias')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('salarios');
    }
}
