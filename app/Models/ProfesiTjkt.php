<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfesiTjkt extends Model
{
    use HasFactory;

    protected $table = 'profesi_tjkts'; // Nama tabel di database
    protected $fillable = ['judul'];
}
