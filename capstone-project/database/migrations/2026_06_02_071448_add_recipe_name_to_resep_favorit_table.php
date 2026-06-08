<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('resep_favorit', function (Blueprint $table) {
            // Kita tambahkan kolom recipe_name yang dicari oleh Laravel tadi
            $table->string('recipe_name')->after('recipe_id')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('resep_favorit', function (Blueprint $table) {
            $table->dropColumn('recipe_name');
        });
    }
};