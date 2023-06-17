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
        Schema::create('atasan', function (Blueprint $table) {
            $table->id();
            $table->string('npk',40);
            $table->string('nama', 60);
            $table->string('jabatan',40);
            $table->string('email',60);
            $table->string('no_hp',32);
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('atasan');
    }
};
