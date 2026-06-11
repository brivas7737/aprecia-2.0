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
        Schema::create('tutores', function (Blueprint $table) {
            $table->id();

$table->string('nombre',100);
$table->string('apellido',100);

$table->string('ci',20)->nullable();

$table->string('telefono',20)->nullable();

$table->string('correo',150)->nullable();

$table->string('direccion')->nullable();

$table->string('parentesco',50);

$table->timestamps();

$table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tutors');
    }
};
