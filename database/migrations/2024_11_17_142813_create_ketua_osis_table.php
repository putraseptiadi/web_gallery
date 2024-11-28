<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKetuaOsisTable extends Migration
{
    public function up()
    {
        Schema::create('ketua_osis', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('periode');
            $table->text('deskripsi');
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ketua_osis');
    }
}
