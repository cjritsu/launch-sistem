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
        Schema::dropIfExists('pengajuan__cutis');
        Schema::create('pengajuan__cutis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('jenis_cuti_id');
            $table->date('tanggal_mulai');
            $table->date('tanggal_akhir');
            $table->string('keterangan');
            $table->unsignedBigInteger('status_id')->default('1');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('jenis_cuti_id')->references('id')->on('jenis_cutis')->onDelete('cascade');
            $table->foreign('status_id')->references('id')->on('status_cutis')->onDelete('cascade');
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
