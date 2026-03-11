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
        Schema::create('sukien', function (Blueprint $table) {

            $table->integer('MaSuKien')->primary();

            $table->string('TenSuKien');
            $table->text('MoTa')->nullable();
            $table->string('DiaDiem')->nullable();

            $table->date('ThoiGian')->nullable();

            $table->string('HinhThuc')->nullable();
            $table->integer('SoLuongToiDa')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('sukien');
    }
};
