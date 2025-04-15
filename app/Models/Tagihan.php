<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Tagihan extends Model
{
    /** @use HasFactory<\Database\Factories\TagihanFactory> */
    use HasFactory;

    protected $fillable = [
        'kendaraan_id',
        'pemilik_id',
        'kode',
        'jenis',
        'status',
        'jatuh_tempo',
        'jumlah_bayar',
    ];

    public function pemilik(): BelongsTo
    {
        return $this->belongsTo(Pemilik::class);
    }

    public function kendaraan(): BelongsTo
    {
        return $this->belongsTo(Kendaraan::class);
    }
}
