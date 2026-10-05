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
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relasi ke tabel users (siswa yang mendaftar)
            $table->foreignId('extracurricular_id')->constrained()->onDelete('cascade'); // Relasi ke tabel extracurriculars (ekskul yang dipilih)
            $table->enum('status', ['Pending', 'Diterima', 'Ditolak'])->default('Pending'); // Status pendaftaran
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};