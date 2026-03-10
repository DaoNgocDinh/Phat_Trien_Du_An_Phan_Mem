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
        Schema::create('dangkysukien', function (Blueprint $table) {

            $table->integer('MaDangky')->primary();

            $table->integer('MaSuKien');
            $table->integer('UserID');

            $table->integer('SoLuongDangKy')->nullable();
            $table->date('ThoiGianDangKy')->nullable();

            $table->foreign('MaSuKien')->references('MaSuKien')->on('sukien');
            $table->foreign('UserID')->references('UserID')->on('taikhoan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('dangkysukien');
    }
};
