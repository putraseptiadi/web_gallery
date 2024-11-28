<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrestasiTkro extends Model
{
    use HasFactory;

    protected $table = 'prestasi_tkros'; // Nama tabel di database
    protected $fillable = ['judul', 'tahun'];
}
