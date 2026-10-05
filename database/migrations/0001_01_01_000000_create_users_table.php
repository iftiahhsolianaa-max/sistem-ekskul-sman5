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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');                      // Nama lengkap siswa/admin
            $table->string('email')->unique();           // Email untuk login
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');                  // Password terenkripsi
            $table->string('nis')->nullable();           // Nomor Induk Siswa (khusus siswa)
            $table->enum('role', ['admin', 'siswa'])->default('siswa'); // Hak akses: admin atau siswa
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};