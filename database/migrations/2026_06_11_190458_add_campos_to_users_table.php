<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up(): void
{
    Schema::table('users', function (Blueprint $table) {

        $table->foreignId('rol_id')
              ->nullable()
              ->constrained('roles');

        $table->string('apellido', 100)
              ->nullable()
              ->after('name');

        $table->string('telefono', 20)
              ->nullable();

        $table->string('foto')
              ->nullable();

        $table->timestamp('ultimo_acceso')
              ->nullable();

        $table->boolean('activo')
              ->default(true);

        $table->softDeletes();
    });
}

    /**
     * Reverse the migrations.
     */
public function down(): void
{
    Schema::table('users', function (Blueprint $table) {

        $table->dropForeign(['rol_id']);

        $table->dropColumn([
            'rol_id',
            'apellido',
            'telefono',
            'foto',
            'ultimo_acceso',
            'activo',
            'deleted_at'
        ]);
    });
}
};
