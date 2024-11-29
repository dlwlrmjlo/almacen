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
        Schema::table('products', function (Blueprint $table) {
            // Agregar columna owner con clave foránea
            $table->unsignedBigInteger('owner')->nullable()->after('id'); // Ajusta "after" según tu tabla
            $table->foreign('owner')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Eliminar la clave foránea y la columna
            $table->dropForeign(['owner']);
            $table->dropColumn('owner');
        });
    }
};
