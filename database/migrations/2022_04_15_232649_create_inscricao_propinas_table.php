<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscricaoPropinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscricao_propinas', function (Blueprint $table) {
            $table->id();
            $table->text('user_id');
            $table->decimal('valor_pago', $precision = 8, $scale = 2);
            $table->foreignId('inscricao_id');
            $table->foreign('user_id')->references('users')->onDelete('cascade');
            $table->foreign('inscricao_id')->references('inscricoes')->onDelete('cascade');
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
        Schema::dropIfExists('inscricao_propinas');
    }
}
