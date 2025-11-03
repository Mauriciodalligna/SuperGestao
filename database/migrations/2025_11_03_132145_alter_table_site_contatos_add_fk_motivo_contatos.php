<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AlterTableSiteContatosAddFkMotivoContatos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->unsignedBigInteger('motivo_contato_id')->nullable()->after('email');
        });

        DB::statement('UPDATE site_contatos SET motivo_contato_id = motivo_contato WHERE motivo_contato IS NOT NULL');

        DB::statement('ALTER TABLE site_contatos MODIFY motivo_contato_id BIGINT UNSIGNED NOT NULL');

        Schema::table('site_contatos', function (Blueprint $table) {
            $table->foreign('motivo_contato_id')->references('id')->on('motivo_contatos');
            $table->dropColumn('motivo_contato');
        });    
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->dropForeign(['motivo_contato_id']);
        });

        Schema::table('site_contatos', function (Blueprint $table) {
            $table->integer('motivo_contato')->nullable();
        });

        DB::statement('update site_contatos set motivo_contato = motivo_contato_id');

        Schema::table('site_contatos', function (Blueprint $table) {
            $table->dropColumn('motivo_contato_id');
        });
    }
}
