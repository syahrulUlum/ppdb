<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengaturanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengaturan', function (Blueprint $table) {
            $table->id();
            $table->string('foto_sekolah')->nullable();
            $table->string('ajakan')->nullable();
            $table->timestamp('buka_pendaftaran')->nullable();
            $table->timestamp('tutup_pendaftaran')->nullable();
            $table->string('foto_kepsek')->nullable();
            $table->string('nama_kepsek')->nullable();
            $table->text('pesan_kepsek')->nullable();
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
        Schema::dropIfExists('pengaturan');
    }
}
