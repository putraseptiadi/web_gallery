<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfesiTkro extends Model
{
    use HasFactory;

    protected $table = 'profesi_tkros'; // Nama tabel di database
    protected $fillable = ['judul'];
}
