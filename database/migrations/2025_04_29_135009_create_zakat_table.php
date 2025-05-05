<?php
// database/migrations/xxxx_xx_xx_xxxxxx_create_zakat_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZakatTable extends Migration
{
    public function up()
    {
        Schema::create('zakat', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pembayar_zakat');
            $table->decimal('penghasilan_perbulan', 15, 2);
            $table->decimal('bonus', 15, 2)->nullable();
            $table->decimal('utang', 15, 2)->nullable();
            $table->string('pantiasuhan');
            $table->boolean('is_paid')->default(false);
            $table->boolean('is_approved')->default(false); // Kolom untuk tracking persetujuan admin
            $table->string('status')->default('Pending'); // Tambahkan kolom status dengan default 'Pending'
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('zakat');
    }
}    