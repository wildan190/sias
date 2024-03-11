<?php

// database/migrations/2024_03_07_create_program_studis_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramStudisTable extends Migration
{
    public function up()
    {
        Schema::create('program_studis', function (Blueprint $table) {
            $table->id();
            $table->string('prodi_id')->unique();
            $table->string('nama_prodi');
            $table->unsignedBigInteger('ketua_prodi'); // Ubah tipe data ke unsignedBigInteger
            $table->timestamps();

            // Tambahkan foreign key constraint
            $table->foreign('ketua_prodi')->references('id')->on('gurus')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('program_studis');
    }
}
