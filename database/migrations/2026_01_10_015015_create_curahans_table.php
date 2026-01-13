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
        // Tabel Curahans
        Schema::create('curahans', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->string('author');
            $table->timestamps();
        });

        // Tabel Kata Mutiaras
        Schema::create('kata_mutiaras', function (Blueprint $table) {
            $table->id();
            $table->text('quote');
            $table->string('author');
            $table->timestamps();
        });

        // Tabel Daily Insights
        Schema::create('daily_insights', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->text('insight');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_insights');
        Schema::dropIfExists('kata_mutiaras');
        Schema::dropIfExists('curahans');
    }
};