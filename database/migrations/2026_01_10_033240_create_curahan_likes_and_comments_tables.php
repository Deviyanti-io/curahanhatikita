<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('curahan_likes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('curahan_id')->constrained('curahans')->onDelete('cascade');
            $table->string('username');
            $table->timestamps();
            
            $table->unique(['curahan_id', 'username']);
        });

        Schema::create('curahan_comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('curahan_id')->constrained('curahans')->onDelete('cascade');
            $table->string('username');
            $table->text('comment');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('curahan_comments');
        Schema::dropIfExists('curahan_likes');
    }
};