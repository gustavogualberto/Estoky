<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome_produto');
            $table->string('imagem')->nullable();
            $table->integer('categoria')->unsigned();
            $table->integer('quantidade');
            $table->decimal('preco_compra', 8, 2);
            $table->decimal('preco_venda', 8, 2)->nullable();
            $table->date('data_compra');
            $table->date('data_venda')->nullable();
            $table->boolean('status')->default(true);
            $table->string('fornecedor');
            $table->string('codigo_de_barras')->unique();
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
        Schema::dropIfExists('produtos');
    }
}
