<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePosisisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posisis', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_kendaraan')->unsigned()->nullable();
            $table->decimal('lat',$precision = 10, $scale = 7)->nullable();
            $table->decimal('long',$precision = 10, $scale = 7)->nullable();
            $table->timestamps();

            $table->foreign('id_kendaraan')->references('id')->on('kendaraans')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posisis');
    }
}
