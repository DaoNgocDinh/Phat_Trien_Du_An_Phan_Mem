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
        Schema::create('lienhe', function (Blueprint $table) {

            $table->integer('MaLienHe')->primary();

            $table->string('HoTen');
            $table->string('Email')->nullable();
            $table->string('ChuDe')->nullable();

            $table->text('NoiDung')->nullable();

            $table->date('ThoiGianGui')->nullable();
            $table->timestamps();
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('lienhe');
    }
};
