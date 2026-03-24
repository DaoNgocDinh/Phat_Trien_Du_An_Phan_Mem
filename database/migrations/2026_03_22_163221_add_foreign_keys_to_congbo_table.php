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
        Schema::table('congbo', function (Blueprint $table) {
            $table->integer('GiangVienID')->nullable()->after('NoiDungTomTat');
            $table->unsignedBigInteger('KhoaID')->nullable()->after('GiangVienID');
            
            $table->foreign('GiangVienID')->references('MaGiangVien')->on('giangvien');
            $table->foreign('KhoaID')->references('MaKhoa')->on('khoa');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('congbo', function (Blueprint $table) {
            $table->dropForeign(['GiangVienID']);
            $table->dropForeign(['KhoaID']);
            $table->dropColumn(['GiangVienID', 'KhoaID']);
        });
    }
};
