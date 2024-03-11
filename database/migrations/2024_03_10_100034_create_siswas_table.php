<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswasTable extends Migration
{
    public function up()
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('nisn')->unique();
            $table->string('nik_siswa')->unique();
            $table->string('nama_siswa');
            $table->date('tanggal_lahir_siswa');
            $table->enum('gender_siswa', ['Laki-laki', 'Perempuan']);
            $table->enum('agama_siswa', ['ISLAM', 'KRISTEN', 'KATOLIK', 'HINDU', 'BUDHA', 'KONGHUCHU']);
            $table->string('golongan_darah')->nullable();
            $table->enum('kewarganegaraan', ['WNI', 'WNA']);
            $table->text('hobi')->nullable();
            $table->string('nomor_telepon_siswa')->nullable();
            $table->string('email_siswa')->unique();
            $table->foreignId('kelas_id')->constrained('kelas');
            $table->foreignId('prodi_id')->constrained('program_studis');
            $table->foreignId('semester_id')->constrained('semesters');
            $table->enum('status', ['aktif', 'lulus', 'drop out']);
            $table->string('foto_siswa')->nullable();
            $table->string('sekolah_asal')->nullable();
            $table->string('angkatan');
            $table->date('tanggal_registrasi');
            $table->enum('siswa_transfer', ['pindahan', 'bukan pindahan']);
            $table->string('asal_transfer')->nullable();
            $table->string('nama_wali_siswa');
            $table->string('pekerjaan_wali_siswa');
            $table->string('pendapatan_wali_siswa');
            $table->string('nomor_telepon_wali');
            $table->string('email_wali')->nullable();
            $table->text('alamat_wali_siswa');
            $table->string('kode_pos');
            $table->timestamps();

            $table->foreign('username')->references('username')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('siswas');
    }
}
