<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKetuaProgramTable extends Migration
{
    public function up()
    {
        Schema::create('ketua_program', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('bidang_keahlian');
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ketua_program');
    }
}
