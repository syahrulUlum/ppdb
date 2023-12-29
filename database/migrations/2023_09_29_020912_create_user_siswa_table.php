<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_siswa', function (Blueprint $table) {
            $table->id();
            $table->string('no_pendaftaran');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('akta_kelahiran')->nullable();
            $table->string('kartu_keluarga')->nullable();
            $table->string('ijazah_tk')->nullable();
            $table->string('kip_pkh')->nullable();
            $table->string('ktp')->nullable();
            $table->enum('status', ["Belum Lengkap", "Lengkap", "Diterima", "Dicadangkan", "Ditolak"])->default("Belum Lengkap");
            $table->string('foto')->nullable();
            $table->string('pesan_tolak')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->boolean('verifikasi')->default(0);
            $table->string('kode_verifikasi')->nullable();
            $table->foreign('user_id')->references('id')->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_siswa');
    }
}
