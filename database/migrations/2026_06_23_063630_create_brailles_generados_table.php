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
Schema::create('brailles_generados', function (Blueprint $table) {

    $table->id();

    $table->foreignId('texto_id')
        ->constrained('textos')
        ->onDelete('cascade');

    $table->string('archivo_brf');

    $table->timestamp('fecha_generacion');

    $table->timestamps();

    $table->softDeletes();

});
    }

    /**
     * Reverse the migrations.
     */
public function down(): void
{
    Schema::dropIfExists(
        'brailles_generados'
    );
}
};
