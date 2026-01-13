<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('moods', function (Blueprint $table) {
        $table->id();
        $table->string('username');
        $table->date('date');
        $table->integer('mood_level'); // Tambahkan baris ini
        $table->string('mood_status')->nullable();
        $table->text('note')->nullable();
        $table->timestamps();
            
            // One mood per user per day
            $table->unique(['username', 'date']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('moods');
    }
};