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
        Schema::create('medicamentos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_cientifico',100);
            $table->string('nombre_generico',200);
            $table->string('dosis',100);
            $table->string('imagen')->nullable();
            $table->text('forma_uso',300);
            $table->text('componentes',200);
            $table->text('descripcion',300);
            $table->text('contra_indicaciones',200);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicamentos');
    }
};
