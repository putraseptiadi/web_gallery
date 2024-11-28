<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrestasiTjkt extends Model
{
    use HasFactory;

    protected $table = 'prestasi_tjkts'; // Nama tabel di database
    protected $fillable = ['judul', 'tahun'];
}
