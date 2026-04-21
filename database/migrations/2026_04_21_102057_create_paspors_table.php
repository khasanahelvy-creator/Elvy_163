<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('paspors', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pemohon');
            $table->string('nik')->unique();
            $table->enum('jenis_paspor', ['Biasa', 'Elektronik']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('paspors');
    }
};