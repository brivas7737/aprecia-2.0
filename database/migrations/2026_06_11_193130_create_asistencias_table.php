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
    Schema::create('asistencias', function (Blueprint $table) {

        $table->id();

        $table->foreignId('sesion_id')
              ->constrained('sesiones')
              ->onDelete('cascade');

        $table->enum('estado', [
            'Presente',
            'Ausente',
            'Justificado'
        ]);

        $table->text('observacion')
              ->nullable();

        $table->timestamps();

        $table->softDeletes();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::dropIfExists('asistencias');
}
};
