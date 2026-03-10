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
        Schema::create('detai', function (Blueprint $table) {

            $table->integer('MaSo')->primary();

            $table->string('TenDeTai')->nullable();
            $table->string('ChuNhiem')->nullable();
            $table->string('DonVi')->nullable();
            $table->string('CapDeTai')->nullable();
            $table->string('LoaiDeTai')->nullable();        

            $table->date('ThoiGianBatDau')->nullable();
            $table->date('ThoiGianKetThuc')->nullable();

            $table->string('TrangThai')->nullable();

            $table->text('MucTieu')->nullable();
            $table->text('NoiDungChinh')->nullable();
            $table->text('ThanhVien')->nullable();
            $table->text('KetQua')->nullable();

            $table->string('FileSanPham')->nullable();
            $table->integer('KinhPhi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('detai');
    }
};
