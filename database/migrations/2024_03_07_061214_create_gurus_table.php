<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGurusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gurus', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('nik_guru');
            $table->string('name');
            $table->date('tanggal_lahir_guru');
            $table->string('email_guru')->unique();
            $table->string('nomor_telepon_guru');
            $table->text('alamat_guru');
            $table->string('nip_guru');
            $table->string('gender');
            $table->string('agama_guru');
            $table->string('spesialis')->nullable();
            $table->string('foto_guru')->nullable();
            $table->timestamps();

            $table->foreign('username')->references('username')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gurus');
    }
}
