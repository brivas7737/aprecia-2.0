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
        Schema::create('logs_sistema', function (Blueprint $table) {
            $table->id();

$table->foreignId('user_id')
      ->nullable()
      ->constrained('users');

$table->string('accion',100);

$table->string('modulo',100);

$table->text('descripcion')
      ->nullable();

$table->string('ip',50)
      ->nullable();

$table->string('navegador')
      ->nullable();

$table->timestamp('fecha_hora')
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
    Schema::dropIfExists('logs_sistema');
}
};
