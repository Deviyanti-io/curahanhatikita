<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('curahans', function (Blueprint $table) {
            $table->boolean('is_anonymous')->default(false)->after('author');
        });
    }

    public function down()
    {
        Schema::table('curahans', function (Blueprint $table) {
            $table->dropColumn('is_anonymous');
        });
    }
};