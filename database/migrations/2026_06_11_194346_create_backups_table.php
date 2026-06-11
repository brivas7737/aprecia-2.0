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
        Schema::create('backups', function (Blueprint $table) {
            $table->id();

$table->foreignId('user_id')
      ->nullable()
      ->constrained('users');

$table->string('nombre_archivo');

$table->string('tipo',50);

$table->bigInteger('tamano')
      ->nullable();

$table->string('ruta_local')
      ->nullable();

$table->string('ruta_nube')
      ->nullable();

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
    Schema::dropIfExists('backups');
}
};
