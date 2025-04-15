<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kendaraan extends Model
{
    /** @use HasFactory<\Database\Factories\KendaraanFactory> */
    use HasFactory;

    protected $fillable = [
        'pemilik_id',
        'model',
        'merek',
        'nomor_polisi',
        'nomor_mesin',
        'tanggal_rilis',
    ];

    public function pemilik(): BelongsTo
    {
        return $this->belongsTo(Pemilik::class);
    }

    public function tagihan(): HasMany
    {
        return $this->hasMany(Tagihan::class);
    }

}
