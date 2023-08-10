<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiOrderDetil extends Model
{
    use HasFactory;

    protected $guarded;

    public function transaksi_order()
    {
        return $this->belongsTo(TransaksiOrder::class);
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
