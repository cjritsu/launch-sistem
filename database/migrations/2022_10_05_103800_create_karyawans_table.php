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
        Schema::dropIfExists('karyawans');
        Schema::create('karyawans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('jenis_kelamin')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('no_telp')->nullable();
            $table->string('alamat')->nullable();
            $table->unsignedBigInteger('departemen_id');
            $table->unsignedBigInteger('unit_kerja_id');
            $table->unsignedBigInteger('status_karyawan_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('departemen_id')->references('id')->on('departemens');
            $table->foreign('unit_kerja_id')->references('id')->on('unit_kerjas');
            $table->foreign('status_karyawan_id')->references('id')->on('status_karyawans');
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
