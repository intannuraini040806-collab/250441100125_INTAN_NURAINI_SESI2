<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanans';

    protected $fillable = [
        'menu_id',
        'nama_pelanggan',
        'nomor_meja',
        'jumlah',
        'total_harga',
        'status',
    ];

     public function menu(): BelongsTo
    {
        return $this->belongsTo(menu::class, 'menu_id');
    }
}

