<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJalursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jalurs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('hari')->unsigned()->nullable();
            $table->string('kota_asal')->nullable();
            $table->string('kota_tujuan')->nullable();
            $table->integer('harga')->nullable();
            $table->time('keberangkatan')->nullable();

            $table->timestamps();

            $table->foreign('hari')->references('id')->on('haris')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jalurs');
    }
}
