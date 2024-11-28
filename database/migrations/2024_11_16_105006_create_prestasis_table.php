<?php

// database/migrations/xxxx_xx_xx_xxxxxx_create_prestasis_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrestasisTable extends Migration
{
    public function up()
    {
        Schema::create('prestasis', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->year('tahun');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('prestasis');
    }
}
