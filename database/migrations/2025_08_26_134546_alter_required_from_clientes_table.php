<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AlterRequiredFromClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('PRAGMA foreign_keys = OFF'); // desativa foreign keys

        Schema::table('clientes', function (Blueprint $table) {
            $table->dropColumn('email'); // apaga a coluna antiga
        });

        Schema::table('clientes', function (Blueprint $table) {
            $table->string('email')->nullable()->unique(); // cria a nova do jeito que quer
        });

        DB::statement('PRAGMA foreign_keys = ON'); // ativa de novo
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clientes', function (Blueprint $table) {
            //
        });
    }
}
