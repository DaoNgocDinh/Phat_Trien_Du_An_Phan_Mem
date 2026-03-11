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
        Schema::create('thongbao', function (Blueprint $table) {

            $table->integer('MaThongBao')->primary();

            $table->string('TieuDe');
            $table->text('NoiDung')->nullable();

            $table->string('LoaiThongBao')->nullable();
            $table->date('NgayTao')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //\
        Schema::dropIfExists('thongbao');
    }
};
