<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('nghiencuusinh', function (Blueprint $table) {

            // PRIMARY KEY (AUTO INCREMENT)
            $table->increments('MaSinhVien');

            // FOREIGN KEY -> TAIKHOAN
            $table->integer('UserID')->nullable();

            // THÔNG TIN
            $table->string('HoTen')->nullable();

            // ✅ SỬA: dùng MaKhoa thay vì string Khoa
            $table->unsignedBigInteger('MaKhoa')->nullable();

            $table->string('Lop')->nullable();
            $table->date('NgaySinh')->nullable();
            $table->string('Email')->nullable();

            // FOREIGN KEY
            $table->foreign('UserID')
                ->references('UserID')
                ->on('taikhoan')
                ->onDelete('set null');

            // Remove foreign key to khoa here, will be added in update migration
            // $table->foreign('MaKhoa')
            //     ->references('MaKhoa')
            //     ->on('khoa')
            //     ->onDelete('set null');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nghiencuusinh');
    }
};