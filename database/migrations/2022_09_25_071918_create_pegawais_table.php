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
        Schema::dropIfExists('pegawais');
        Schema::dropIfExists('pegawai');
        // Schema::create('pegawais', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('name');
        //     $table->unsignedBigInteger('user_id');
        //     $table->unsignedBigInteger('departemen_id');
        //     $table->unsignedBigInteger('unit_kerja_id');
        //     $table->timestamps();

        //     $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        //     $table->foreign('departemen_id')->references('id')->on('departemens')->onDelete('cascade');
        //     $table->foreign('unit_kerja_id')->references('id')->on('unit_kerjas')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pegawais');
    }
};
