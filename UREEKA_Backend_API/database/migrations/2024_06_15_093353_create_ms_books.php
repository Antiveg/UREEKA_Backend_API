<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ms_books', function (Blueprint $table) {
            $table->string('judul');
            $table->string('isbn')->primary()->unique();
            $table->string('penulis');
            $table->integer('tahun_terbit');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ms_books');
    }
};
