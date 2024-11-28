<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KetuaOsis extends Model
{
    use HasFactory;

    // Pastikan penamaan tabel sesuai dengan nama tabel di database
    protected $table = 'ketua_osis'; // Pastikan nama tabel ini sesuai dengan yang ada di database
    protected $fillable = ['nama', 'periode', 'deskripsi', 'foto'];
}
