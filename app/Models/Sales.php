<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $guarded;

    public function order()
    {
        return $this->hasOne(TransaksiOrder::class);
    }
}
