<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_siswa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_siswa_id');
            $table->enum('jenis_pendaftaran', ["Siswa Baru", "Siswa Pindahan"])->nullable();
            $table->enum('jalur_pendaftaran', ["Zonasi", "Afirmasi", "Perpindahan Tugas"])->nullable();
            $table->string('asal_sekolah')->nullable();
            $table->string('nama_lengkap')->nullable();
            $table->enum('jenis_kelamin', ["L", "P"])->nullable();
            $table->string('nisn')->nullable();
            $table->string('nik')->nullable();
            $table->string('no_kk')->nullable();
            $table->string('no_akta_lahir')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('agama', ["Islam", "Kristen Katholik", "Kristen Protestan", "Hindu", "Buddha", "Konghucu"])->nullable();
            $table->integer('anak_ke')->nullable();
            $table->integer('jumlah_saudara')->nullable();
            $table->decimal("berat_badan")->nullable();
            $table->decimal("tinggi_badan")->nullable();
            $table->string('no_kip')->nullable();
            $table->string('nama_kip')->nullable();
            $table->timestamps();

            $table->foreign('user_siswa_id')->references('id')->on('user_siswa')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_siswa');
    }
}
