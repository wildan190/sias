<?php

// Contoh migrasi untuk tabel semesters
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSemestersTable extends Migration
{
    public function up()
    {
        Schema::create('semesters', function (Blueprint $table) {
            $table->id();
            $table->string('nama_semester');
            $table->text('deskripsi_semester')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('semesters');
    }
}

