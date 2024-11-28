<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfesiTflmsTable extends Migration
{
    public function up()
    {
        Schema::create('profesi_tflms', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('profesi_tflms');
    }
}
