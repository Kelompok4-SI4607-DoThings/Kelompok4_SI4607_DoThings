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
        Schema::create('zakats', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pembayar');
            $table->decimal('penghasilan_perbulan', 15, 2)->default(0);
            $table->decimal('bonus', 15, 2)->default(0);
            $table->decimal('utang', 15, 2)->default(0);
            $table->string('panti_asuhan');
            $table->decimal('jumlah_zakat', 15, 2)->nullable();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zakats');
    }
};
