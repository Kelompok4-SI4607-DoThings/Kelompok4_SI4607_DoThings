<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('komunitas_admins', function (Blueprint $table) {
            $table->id();
            $table->string('judul_komunitas');
            $table->date('tanggal_dibuat');
            $table->string('category');
            $table->text('deskripsi');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('komunitas_admins');
    }
};