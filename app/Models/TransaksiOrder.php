<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiOrder extends Model
{
    use HasFactory;

    protected $guarded;

    public function sales()
    {
        return $this->belongsTo(Sales::class);
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
