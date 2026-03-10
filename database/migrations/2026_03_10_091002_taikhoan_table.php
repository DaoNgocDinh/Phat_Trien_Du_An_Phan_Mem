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
        Schema::create('taikhoan', function (Blueprint $table) {
            $table->integer('UserID')->primary();
            $table->string('MatKhau',100);
            $table->string('VaiTro',20);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('taikhoan');
    }
};
