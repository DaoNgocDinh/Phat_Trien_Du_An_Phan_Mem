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
        Schema::table('giangvien', function (Blueprint $table) {
            // Thêm foreign keys
            $table->unsignedBigInteger('MaKhoa')->nullable()->after('UserID');
            $table->unsignedBigInteger('MaChucVu')->nullable()->after('MaKhoa');

            // Thêm foreign key constraints
            $table->foreign('MaKhoa')->references('MaKhoa')->on('khoa');
            $table->foreign('MaChucVu')->references('MaChucVu')->on('chucvu');

            // Loại bỏ các trường string cũ
            $table->dropColumn(['ChucVu', 'Khoa']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('giangvien', function (Blueprint $table) {
            // Khôi phục các trường string cũ
            $table->string('ChucVu')->nullable()->after('UserID');
            $table->string('Khoa')->nullable()->after('ChucVu');

            // Loại bỏ foreign keys
            $table->dropForeign(['MaKhoa']);
            $table->dropForeign(['MaChucVu']);
            $table->dropColumn(['MaKhoa', 'MaChucVu']);
        });
    }
};
