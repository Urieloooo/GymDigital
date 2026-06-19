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
    Schema::create('historial_eliminacions', function (Blueprint $table) {
        $table->id();

        $table->foreignId('cliente_id')
              ->constrained('clientes')
              ->onDelete('cascade');

        $table->text('motivo');

        $table->date('fecha_eliminacion');

        $table->foreignId('eliminado_por')
              ->constrained('users')
              ->onDelete('cascade');

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historial_eliminacions');
    }
};
