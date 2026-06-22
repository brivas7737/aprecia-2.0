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
    Schema::table('personal', function (Blueprint $table) {

        $table->string(
            'especialidad_certificado',
            255
        )->nullable();

        $table->integer(
            'anios_servicio'
        )->nullable();

    });
}

public function down(): void
{
    Schema::table('personal', function (Blueprint $table) {

        $table->dropColumn([
            'especialidad_certificado',
            'anios_servicio'
        ]);

    });
}
};
