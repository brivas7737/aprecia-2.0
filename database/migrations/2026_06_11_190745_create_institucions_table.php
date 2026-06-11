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
        Schema::create('instituciones', function (Blueprint $table) {
    $table->id();

    $table->string('nombre', 150);

    $table->string('direccion')
          ->nullable();

    $table->string('ciudad', 100)
          ->nullable();

    $table->string('telefono', 20)
          ->nullable();

    $table->string('correo', 150)
          ->nullable();

    $table->string('director', 150)
          ->nullable();

    $table->boolean('estado')
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
        Schema::dropIfExists('institucions');
    }
};
