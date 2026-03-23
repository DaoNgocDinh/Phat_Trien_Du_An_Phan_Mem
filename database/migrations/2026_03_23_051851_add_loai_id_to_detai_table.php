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
        Schema::table('detai', function (Blueprint $table) {
            $table->foreignId('loai_id')->nullable()->constrained('loai_de_tais');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('detai', function (Blueprint $table) {
            //
        });
    }
};
