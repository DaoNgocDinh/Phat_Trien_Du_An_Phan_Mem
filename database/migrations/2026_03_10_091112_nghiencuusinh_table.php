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
        Schema::create('nghiencuusinh', function (Blueprint $table) {

            $table->integer('MaSinhVien')->primary();
            $table->integer('UserID')->nullable();

            $table->string('HoTen')->nullable();
            $table->string('Khoa')->nullable();
            $table->string('Lop')->nullable();
            $table->date('NgaySinh')->nullable();

            $table->foreign('UserID')->references('UserID')->on('taikhoan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('nghiencuusinh');
    }
};
