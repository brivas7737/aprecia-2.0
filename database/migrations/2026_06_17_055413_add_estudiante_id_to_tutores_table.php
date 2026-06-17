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
    Schema::table('tutores', function (Blueprint $table) {

        $table->foreignId('estudiante_id')
              ->after('id')
              ->constrained('estudiantes');

    });
}

    /**
     * Reverse the migrations.
     */
public function down(): void
{
    Schema::table('tutores', function (Blueprint $table) {

        $table->dropForeign(['estudiante_id']);
        $table->dropColumn('estudiante_id');

    });
}
};
