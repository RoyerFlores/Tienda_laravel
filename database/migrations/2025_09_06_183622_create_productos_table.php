<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);

            // fk a categorias (nullable)
            $table->foreignId('categoria_id')
                  ->nullable()
                  ->constrained('categorias')
                  ->nullOnDelete()
                  ->cascadeOnUpdate();

            $table->string('imagen', 255)->nullable();

            // usuario_id: si quieres FK a users descomenta la línea siguiente.
            // Si no tienes la tabla users o no quieres la FK, dejalo como unsignedBigInteger nullable.
            // $table->foreignId('usuario_id')->nullable()->constrained('users')->nullOnDelete()->cascadeOnUpdate();
            $table->unsignedBigInteger('usuario_id')->nullable();

            $table->decimal('precio_compra', 10, 2);
            $table->decimal('precio_venta', 10, 2);
            $table->integer('stock')->default(0);
            $table->string('unidad_medida', 20)->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
