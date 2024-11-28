<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrestasiTflm extends Model
{
    use HasFactory;

    protected $table = 'prestasi_tflms'; // Nama tabel di database
    protected $fillable = ['judul', 'tahun'];
}
