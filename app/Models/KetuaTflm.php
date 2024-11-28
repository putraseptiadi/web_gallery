<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KetuaTflm extends Model
{
    use HasFactory;

    protected $table = 'tflm_program';

    protected $fillable = [
        'nama',
        'bidang_keahlian',
        'foto',
    ];
}
