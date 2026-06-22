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
    Schema::table('personal', function (Blueprint $table) {

        $table->foreignId('area_atencion_id')
              ->nullable()
              ->after('rol_id')
              ->constrained('areas_atencion');

    });
}

    /**
     * Reverse the migrations.
     */
public function down(): void
{
    Schema::table('personal', function (Blueprint $table) {

        $table->dropForeign(['area_atencion_id']);

        $table->dropColumn('area_atencion_id');

    });
}
};
