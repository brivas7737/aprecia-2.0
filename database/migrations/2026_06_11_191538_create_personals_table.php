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
    Schema::create('personal', function (Blueprint $table) {

        $table->id();

        $table->foreignId('institucion_id')
              ->constrained('instituciones');

        $table->string('nombre',100);

        $table->string('apellido',100);

        $table->string('ci',20)->nullable();

        $table->string('telefono',20)->nullable();

        $table->string('correo',150)->nullable();

        $table->string('cargo',100);

        $table->date('fecha_ingreso')->nullable();

        $table->boolean('activo')->default(true);

        $table->timestamps();

        $table->softDeletes();
    });
}

public function down(): void
{
    Schema::dropIfExists('personal');
}
};
