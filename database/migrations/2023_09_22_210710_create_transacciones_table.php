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
        Schema::create('transacciones', function (Blueprint $table) {
            $table->id();
            $table->enum('tipo_transaccion',['Deposito','Retiro','Ganancia de Apuesta','Pérdida de Apuesta','Bonificacion']);
            $table->float('cantidad',12,2);
            $table->dateTime('fecha');
            $table->enum('metodo',['Tarjeta de credito','Transferencia bancaria','Monedero electronico','Efectivo']);
            $table->enum('estado',['Pendiente','Completada','Fallida']);
            $table->string('detalles')->nullable();
            $table->string('id_referencia')->nullable();
            // $table->float('saldo_actual',12,2)->nullable();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transacciones');
    }
};
