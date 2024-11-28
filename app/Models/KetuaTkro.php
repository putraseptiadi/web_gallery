<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KetuaTkro extends Model
{
    use HasFactory;

    protected $table = 'tkro_program';

    protected $fillable = [
        'nama',
        'bidang_keahlian',
        'foto',
    ];
}
