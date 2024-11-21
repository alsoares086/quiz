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
        Schema::create('jogos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_usuario_1')->constrained('users')->onDelete('cascade');  
            $table->foreignId('id_usuario_2')->constrained('users')->onDelete('cascade');  
            $table->foreignId('vencedor')->nullable()->constrained('users')->onDelete('set null'); 
            $table->timestamp('data_jogo')->useCurrent();  
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jogos');
    }
};
