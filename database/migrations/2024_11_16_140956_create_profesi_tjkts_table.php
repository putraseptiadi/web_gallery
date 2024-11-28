<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfesiTjktsTable extends Migration
{
    public function up()
    {
        Schema::create('profesi_tjkts', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('profesi_tjkts');
    }
}
