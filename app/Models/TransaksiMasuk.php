<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiMasuk extends Model
{
    use HasFactory;

    protected $guarded;

    public function mitra()
    {
        return $this->belongsTo(Mitra::class);
    }
}
