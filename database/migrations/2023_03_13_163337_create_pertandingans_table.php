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
        Schema::create('pertandingan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('klub_tuan_rumah_id');
            $table->foreign('klub_tuan_rumah_id')->references('id')->on('klub');
            $table->unsignedBigInteger('klub_tamu_id');
            $table->foreign('klub_tamu_id')->references('id')->on('klub');
            $table->integer('skor_tuan_rumah')->default(0);
            $table->integer('skor_tamu')->default(0);
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
        Schema::dropIfExists('pertandingan');
    }
};
