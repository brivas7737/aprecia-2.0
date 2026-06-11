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
        Schema::create('textos', function (Blueprint $table) {

    $table->id();

    $table->foreignId('categoria_id')
          ->constrained('categorias');

    $table->foreignId('nivel_educativo_id')
          ->constrained('niveles_educativos');

    $table->foreignId('user_id')
          ->constrained('users');

    $table->string('titulo',255);

    $table->string('autor',255)
          ->nullable();

    $table->text('descripcion')
          ->nullable();

    $table->string('archivo')
          ->nullable();

    $table->string('formato',50)
          ->nullable();

    $table->date('fecha_ingreso');

    $table->timestamps();

    $table->softDeletes();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('textos');
    }
};
