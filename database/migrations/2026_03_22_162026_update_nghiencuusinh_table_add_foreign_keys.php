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
        Schema::table('nghiencuusinh', function (Blueprint $table) {
            // Thêm foreign key constraint (MaKhoa column already exists)
            $table->foreign('MaKhoa')->references('MaKhoa')->on('khoa');
        });
    }

    public function down(): void
    {
        Schema::table('nghiencuusinh', function (Blueprint $table) {
            // Loại bỏ foreign key
            $table->dropForeign(['MaKhoa']);
        });
    }
};
