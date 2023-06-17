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
        Schema::create('pengajuan', function (Blueprint $table) {
            $table->id();
            $table->string('npk',40)->nullable();
            $table->string('nama',60)->nullable();
            $table->bigInteger('karyawan_id')->unsigned();
            $table->string('status_karyawan',40);
            $table->text('judul_pengajuan');
            $table->date('tanggal_pengajuan');
            $table->string('kondisi_sebelum',60);
            $table->string('kondisi_sesudah',60);
            
            $table->timestamps();

            $table->foreign('karyawan_id')->references('id')->on('karyawan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengajuan');
    }
};
