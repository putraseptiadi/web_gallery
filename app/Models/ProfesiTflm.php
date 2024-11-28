<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfesiTflm extends Model
{
    use HasFactory;

    protected $table = 'profesi_tflms'; // Nama tabel di database
    protected $fillable = ['judul'];
}
