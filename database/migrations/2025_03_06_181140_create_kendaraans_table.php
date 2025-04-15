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
        Schema::create('kendaraans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pemilik_id')->constrained()->onDelete('cascade');
            $table->string('model', 100);
            $table->string('merek', 100);
            $table->string('nomor_polisi', 100)->unique();
            $table->string('nomor_mesin', 100)->unique();
            $table->date('tanggal_rilis');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kendaraans');
    }
};
