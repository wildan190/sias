<?php

// database/migrations/YYYY_MM_DD_create_mapels_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMapelsTable extends Migration
{
    public function up()
    {
        Schema::create('mapels', function (Blueprint $table) {
            $table->id();
            $table->string('mapel_id');
            $table->string('nama_mapel');
            $table->unsignedBigInteger('prodi');
            $table->enum('kategori', ['produktif', 'umum']);
            $table->unsignedBigInteger('guru_pengampu');
            $table->timestamps();

            // Foreign key relationship with ProgramStudi model
            $table->foreign('prodi')->references('id')->on('program_studis')->onDelete('cascade');

            // Foreign key relationship with Guru model
            $table->foreign('guru_pengampu')->references('id')->on('gurus')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('mapels');
    }
}
