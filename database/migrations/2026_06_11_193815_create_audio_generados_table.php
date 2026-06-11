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
        Schema::create('audios_generados', function (Blueprint $table) {

    $table->id();

    $table->foreignId('texto_id')
          ->constrained('textos')
          ->onDelete('cascade');

    $table->foreignId('voz_id')
          ->constrained('voces')
          ->onDelete('cascade');

    $table->string('archivo_audio');

    $table->integer('duracion_segundos')
          ->nullable();

    $table->integer('reproducciones')
          ->default(0);

    $table->timestamp('fecha_generacion')
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
    Schema::dropIfExists('audios_generados');
}
};
