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
        Schema::create('estudiantes', function (Blueprint $table) {

    $table->id();

    $table->foreignId('institucion_id')
          ->constrained('instituciones');

    $table->foreignId('nivel_educativo_id')
          ->constrained('niveles_educativos');

    $table->foreignId('condicion_visual_id')
          ->constrained('condiciones_visuales');

    $table->string('nombre',100);

    $table->string('apellido',100);

    $table->string('ci',20)->nullable();

    $table->date('fecha_nacimiento')
          ->nullable();

    $table->integer('edad')
          ->nullable();

    $table->string('telefono',20)
          ->nullable();

    $table->string('correo',150)
          ->nullable();

    $table->string('direccion')
          ->nullable();

    $table->date('fecha_registro');

    $table->string('codigo_estudiantil',50)
      ->nullable();

      $table->string('foto')
      ->nullable();

    $table->boolean('activo')
          ->default(true);

    $table->timestamps();

    $table->softDeletes();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudiantes');
    }
};
