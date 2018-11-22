<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomor');
            $table->string('name');
            $table->text('address');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('foto')->nullable();
            $table->date('tgl_lahir')->default('2010-01-01');
            $table->string('tmpt_lahir')->nullable();
            $table->date('expired')->nullable();
            $table->string('status')->default('Active');

            $table->softDeletes();
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
        Schema::dropIfExists('members');
    }
}
