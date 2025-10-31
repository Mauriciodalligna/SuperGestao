<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AjusteProdutosFiliais extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('filiais')) {
            Schema::create('filiais', function (Blueprint $table) {
                $table->id();
                $table->string('filial', 30);
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('produto_filiais')) {
            Schema::create('produto_filiais', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('filial_id');
                $table->unsignedBigInteger('produto_id');
                $table->decimal('preco_venda', 8, 2);
                $table->integer('estoque_minimo');
                $table->integer('estoque_maximo');
                $table->timestamps();

                $table->foreign('filial_id')->references('id')->on('filiais');
                $table->foreign('produto_id')->references('id')->on('produtos');
            });
        }

        Schema::table('produtos', function (Blueprint $table) {
            if (Schema::hasColumn('produtos', 'preco_venda')) {
                $table->dropColumn('preco_venda');
            }
            if (Schema::hasColumn('produtos', 'estoque_minimo')) {
                $table->dropColumn('estoque_minimo');
            }
            if (Schema::hasColumn('produtos', 'estoque_maximo')) {
                $table->dropColumn('estoque_maximo');
            }
        });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Restaurar colunas em produtos, apenas se não existirem
        Schema::table('produtos', function (Blueprint $table) {
            if (!Schema::hasColumn('produtos', 'preco_venda')) {
                $table->decimal('preco_venda', 8, 2)->default(0.01);
            }
            if (!Schema::hasColumn('produtos', 'estoque_minimo')) {
                $table->integer('estoque_minimo')->default(1);
            }
            if (!Schema::hasColumn('produtos', 'estoque_maximo')) {
                $table->integer('estoque_maximo')->default(1);
            }
        });

        // Dropar FKs antes de dropar a tabela de pivot
        if (Schema::hasTable('produto_filiais')) {
            Schema::table('produto_filiais', function (Blueprint $table) {
                if (Schema::hasColumn('produto_filiais', 'filial_id')) {
                    $table->dropForeign(['filial_id']);
                }
                if (Schema::hasColumn('produto_filiais', 'produto_id')) {
                    $table->dropForeign(['produto_id']);
                }
            });
        }

        Schema::dropIfExists('produto_filiais');
        Schema::dropIfExists('filiais');
    }

}