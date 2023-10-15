<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataAlamatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_alamat', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_siswa_id');
            $table->enum("status_tempat_tinggal", ["Milik Sendiri", "Sewa", "Menumpang"])->nullable();
            $table->string("alamat")->nullable();
            $table->string("rt_rw")->nullable();
            $table->string("desa")->nullable();
            $table->string("kecamatan")->nullable();
            $table->string("kab_kota")->nullable();
            $table->string("provinsi")->nullable();
            $table->integer("kode_pos")->nullable();
            $table->decimal("jarak")->nullable();
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
        Schema::dropIfExists('data_alamat');
    }
}
