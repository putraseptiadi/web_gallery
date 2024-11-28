<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Job extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'company', 'description', 'location', 'deadline'];

    // Format tanggal deadline
    public function getDeadlineAttribute($value)
    {
        return Carbon::parse($value)->format('d F Y');
    }
}
