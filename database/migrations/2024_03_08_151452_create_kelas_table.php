<?php

// database/migrations/{tanggal}_create_kelas_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelasTable extends Migration
{
    public function up()
    {
        Schema::create('kelas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kelas');
            $table->foreignId('prodi_id')->constrained('program_studis')->onDelete('cascade');
            $table->foreignId('wali_kelas_id')->constrained('gurus')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kelas');
    }
}
