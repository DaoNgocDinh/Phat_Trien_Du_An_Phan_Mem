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
        Schema::create('congbo', function (Blueprint $table) {

            $table->integer('MaCongBo')->primary();

            $table->string('TenCongBo');
            $table->string('TacGia')->nullable();

            $table->integer('NamXuatBan')->nullable();

            $table->string('NoiCongBo')->nullable();
            $table->string('LoaiCongBo')->nullable();

            $table->string('DOI')->nullable();
            $table->string('FilePDF')->nullable();

            $table->text('NoiDungTomTat')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('congbo');
    }
};
