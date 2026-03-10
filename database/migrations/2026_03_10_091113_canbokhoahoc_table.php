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
        Schema::create('canbokhoahoc', function (Blueprint $table) {

            $table->integer('MaCanBo_admin')->primary();
            $table->integer('UserID')->nullable();

            $table->string('PhongBan')->nullable();
            $table->string('ChucVu')->nullable();
            $table->string('HocVi')->nullable();
            $table->string('TrangThai')->nullable();

            $table->foreign('UserID')->references('UserID')->on('taikhoan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('canbokhoahoc');
    }
};
