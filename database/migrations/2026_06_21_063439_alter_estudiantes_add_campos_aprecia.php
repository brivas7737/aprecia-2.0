<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('estudiantes', function (Blueprint $table) {

            $table->string('rudees',30)
                  ->nullable()
                  ->after('ci');

            $table->foreignId('programa_id')
                  ->nullable()
                  ->after('condicion_visual_id')
                  ->constrained('programas');

            $table->foreignId('servicio_id')
                  ->nullable()
                  ->after('programa_id')
                  ->constrained('servicios');

            $table->foreignId('paralelo_id')
                  ->nullable()
                  ->after('servicio_id')
                  ->constrained('paralelos');

        });
    }

    public function down(): void
    {
        Schema::table('estudiantes', function (Blueprint $table) {

            $table->dropForeign(['programa_id']);
            $table->dropForeign(['servicio_id']);
            $table->dropForeign(['paralelo_id']);

            $table->dropColumn([
                'rudees',
                'programa_id',
                'servicio_id',
                'paralelo_id'
            ]);

        });
    }
};