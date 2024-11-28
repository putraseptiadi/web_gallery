<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KetuaTjkt extends Model
{
    use HasFactory;

    protected $table = 'tjkt_program';

    protected $fillable = [
        'nama',
        'bidang_keahlian',
        'foto',
    ];
}
