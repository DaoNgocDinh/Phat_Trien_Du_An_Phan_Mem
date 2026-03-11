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
        Schema::create('tiendodetai', function (Blueprint $table) {

            $table->integer('MaTienDo')->primary();
            $table->integer('MaDeTai');

            $table->string('TenDeTai')->nullable();
            $table->string('TrangThai')->nullable();
            $table->date('ThoiGianCapNhat')->nullable();

            $table->string('FileBaoCao')->nullable();
            $table->text('NoiDungBaoCao')->nullable();
            $table->text('KetQua')->nullable();
            $table->text('KhoKhan')->nullable();

            $table->string('TienDoHienTai')->nullable();
            $table->integer('PhanTramTienDo')->nullable();

            $table->foreign('MaDeTai')->references('MaSo')->on('detai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('tiendodetai');
    }
};
