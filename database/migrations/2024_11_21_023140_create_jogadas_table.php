<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('jogadas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_jogo')->constrained('jogos')->onDelete('cascade');
            $table->foreignId('id_usuario')->constrained('users')->onDelete('cascade');
            $table->integer('id_pergunta')->nullable(); 
            $table->integer('id_resposta')->nullable();
            $table->boolean('correta')->default(false); 
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jogadas');
    }
};
