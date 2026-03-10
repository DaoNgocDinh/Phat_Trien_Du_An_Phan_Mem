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
        //
        Schema::create('giangvien', function (Blueprint $table) {
            $table->integer('MaGiangVien')->primary();
            $table->integer('UserID')->nullable();

            $table->string('HoTen')->nullable();
            $table->string('ChucVu')->nullable();
            $table->string('Khoa')->nullable();
            $table->string('Email')->nullable();
            $table->string('Sdt',12)->nullable();
            $table->string('AnhDaiDien')->nullable();
            $table->string('CV')->nullable();

            $table->foreign('UserID')->references('UserID')->on('taikhoan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('giangvien');
    }
};
