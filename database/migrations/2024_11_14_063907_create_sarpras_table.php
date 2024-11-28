<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSarprasTable extends Migration
{
    public function up()
    {
        Schema::create('sarpras', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama sarana/prasarana
            $table->string('description')->nullable(); // Deskripsi
            $table->string('photo_path'); // Path foto
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sarpras');
    }
}
