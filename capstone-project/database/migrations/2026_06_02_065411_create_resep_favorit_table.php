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
    Schema::create('resep_favorit', function (Blueprint $table) {
        $table->id();
        // Kolom id_user untuk mencatat siapa yang menyimpan (sementara di-set nullable dulu jika belum pasang login)
        $table->unsignedBigInteger('user_id')->nullable(); 
        // Kolom untuk menampung ID numerik resep dari hasil AI/MySQL
        $table->integer('recipe_id'); 
        $table->string('recipe_name');
        $table->string('image_url')->nullable();
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resep_favorit');
    }
};
