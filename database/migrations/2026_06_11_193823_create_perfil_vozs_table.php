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
        Schema::create('perfiles_voz', function (Blueprint $table) {

    $table->id();

    $table->foreignId('estudiante_id')
          ->constrained('estudiantes')
          ->onDelete('cascade');

    $table->string('nombre_perfil',100);

    $table->string('archivo_referencia');

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
    Schema::dropIfExists('perfiles_voz');
}
};
