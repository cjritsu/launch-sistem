<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('pengajuan__absens');
        Schema::enableForeignKeyConstraints();
        Schema::create('pengajuan__absens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('unit_kerja_id');
            $table->date('tanggal_absen_awal');
            $table->date('tanggal_absen_akhir');
            $table->date('tanggal_berita');
            $table->string('tinggalin_absen')->nullable();
            $table->date('tanggal_masuk');
            $table->string('keterangan');
            $table->string('image')->nullable();
            $table->string('surat_dokter');
            $table->unsignedBigInteger('status_kp')->default('1');
            $table->unsignedBigInteger('status_rek')->default('1');
            $table->unsignedBigInteger('status_hrd')->default('1');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('unit_kerja_id')->references('id')->on('unit_kerjas')->onDelete('cascade');
            $table->foreign('status_kp')->references('id')->on('status_surat')->onDelete('cascade');
            $table->foreign('status_rek')->references('id')->on('status_surat')->onDelete('cascade');
            $table->foreign('status_hrd')->references('id')->on('status_surat')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
