<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKeuangansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keuangans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('price');
            $table->string('note');
            $table->integer('iddenda')->unsigned();
            $table->foreign('iddenda')->references('id')->on('dendas')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreign('idbuku')->references('id')->on('bukus')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('keuangans');
    }
}
