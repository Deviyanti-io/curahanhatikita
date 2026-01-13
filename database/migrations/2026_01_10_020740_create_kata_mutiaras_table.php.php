<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('kata_mutiaras', function (Blueprint $table) {
            $table->id();
            $table->text('quote');
            $table->string('author');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kata_mutiaras');
    }
};