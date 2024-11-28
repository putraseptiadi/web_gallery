<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'buku'; // Pastikan ini sesuai dengan nama tabel yang kamu buat
    protected $fillable = ['judul', 'penulis', 'penerbit', 'tahun_terbit', 'foto', 'status'];
}
