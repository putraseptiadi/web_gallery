<?php

// database/migrations/xxxx_xx_xx_xxxxxx_create_profesis_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfesisTable extends Migration
{
    public function up()
    {
        Schema::create('profesis', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('profesis');
    }
}
