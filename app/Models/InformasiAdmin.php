<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformasiAdmin extends Model
{
    use HasFactory;

    protected $table = 'informasi_admins'; // Menentukan nama tabel
    protected $fillable = ['instagram_url', 'description']; // Menentukan kolom yang bisa diisi
}
