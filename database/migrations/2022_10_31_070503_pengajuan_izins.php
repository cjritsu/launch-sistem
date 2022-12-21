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
        Schema::dropIfExists('pengajuan_izins');
        Schema::enableForeignKeyConstraints();
        Schema::create('pengajuan_izins', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('unit_kerja_id');
            $table->unsignedBigInteger('jenis_izin_id');
            $table->date('tanggal_izin_awal');
            $table->date('tanggal_izin_akhir');
            $table->date('tanggal_masuk');
            $table->integer('num_days')->default('0');
            $table->string('keterangan');
            $table->unsignedBigInteger('status_kp')->default('1');
            $table->unsignedBigInteger('status_hrd')->default('1');
            $table->unsignedBigInteger('status_rek')->default('1');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('unit_kerja_id')->references('id')->on('unit_kerjas')->onDelete('cascade');
            $table->foreign('jenis_izin_id')->references('id')->on('jenis__izins')->onDelete('cascade');
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
        Schema::dropIfExists('pengajuan_izins');
    }
};
