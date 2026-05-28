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
        Schema::create('llistas', function (Blueprint $table) {
            $table->id();

            // Relació amb l'usuari
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Camps de la llista
            $table->string('titol');
            $table->text('descripcio')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('llistas');
    }
};
