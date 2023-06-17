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
        Schema::create('nilai', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('karyawan_id')->unsigned();
            $table->bigInteger('pengajuan_id')->unsigned();
            $table->string('pengajuan', 32);
            $table->string('meeting',32);
            $table->string('kehadiran',32);
            $table->string('total',30);
            $table->string('reward',30);
            $table->date('tanggal');

            $table->foreign('karyawan_id')->references('id')->on('karyawan')->onDelete('cascade');
            $table->foreign('pengajuan_id')->references('id')->on('pengajuan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nilai');
    }
};
